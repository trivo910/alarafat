<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

class BlogContentSanitizer
{
    private const ALLOWED_TAGS = [
        'a', 'blockquote', 'br', 'code', 'div', 'em', 'h1', 'h2', 'h3',
        'hr', 'i', 'img', 'li', 'ol', 'p', 'pre', 's', 'strong', 'u', 'ul',
    ];

    private const DROP_CONTENT_TAGS = ['iframe', 'object', 'script', 'style', 'svg'];

    public static function sanitize(string $html): string
    {
        if (trim($html) === '') {
            return '';
        }

        if (strip_tags($html) === $html) {
            $paragraphs = preg_split('/\R{2,}/', trim($html)) ?: [];
            $html = implode('', array_map(
                fn (string $paragraph): string => '<p>' . nl2br(htmlspecialchars($paragraph, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) . '</p>',
                $paragraphs
            ));
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previousErrorMode = libxml_use_internal_errors(true);
        $document->loadHTML('<?xml encoding="UTF-8"><div id="blog-content">' . $html . '</div>', LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrorMode);

        $container = $document->getElementsByTagName('div')->item(0);
        if (! $container) {
            return '';
        }

        self::sanitizeChildren($container);

        $cleanHtml = '';
        foreach ($container->childNodes as $child) {
            $cleanHtml .= $document->saveHTML($child);
        }

        return trim($cleanHtml);
    }

    private static function sanitizeChildren(DOMNode $parent): void
    {
        foreach (iterator_to_array($parent->childNodes) as $child) {
            if (! $child instanceof DOMElement) {
                continue;
            }

            $tag = strtolower($child->tagName);
            if (! in_array($tag, self::ALLOWED_TAGS, true)) {
                if (in_array($tag, self::DROP_CONTENT_TAGS, true)) {
                    $parent->removeChild($child);
                    continue;
                }

                while ($child->firstChild) {
                    $parent->insertBefore($child->firstChild, $child);
                }
                $parent->removeChild($child);
                continue;
            }

            foreach (iterator_to_array($child->attributes) as $attribute) {
                $name = strtolower($attribute->name);
                $value = trim($attribute->value);
                $keep = match (true) {
                    $tag === 'a' && $name === 'href' => self::isSafeUrl($value),
                    $tag === 'img' && $name === 'src' => self::isSafeUrl($value),
                    in_array($name, ['alt', 'title'], true) => true,
                    in_array($name, ['width', 'height'], true) => ctype_digit($value) && (int) $value <= 2000,
                    $name === 'class' => in_array($value, ['ql-align-center', 'ql-align-right', 'ql-align-justify'], true),
                    default => false,
                };

                if (! $keep) {
                    $child->removeAttributeNode($attribute);
                }
            }

            if ($tag === 'img' && ! $child->hasAttribute('src')) {
                $parent->removeChild($child);
                continue;
            }

            self::sanitizeChildren($child);
        }
    }

    private static function isSafeUrl(string $url): bool
    {
        if ($url === '') {
            return false;
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        return $scheme === null || in_array(strtolower($scheme), ['http', 'https', 'mailto', 'tel'], true);
    }
}