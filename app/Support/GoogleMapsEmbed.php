<?php

namespace App\Support;

class GoogleMapsEmbed
{
    public static function extractUrl(?string $value): ?string
    {
        $value = trim($value ?? '');

        if ($value === '') {
            return null;
        }

        if (str_contains($value, '<') || str_contains($value, '>')) {
            if (! preg_match('/^\s*<iframe\b[^>]*\bsrc\s*=\s*(["\'])(.*?)\1[^>]*>\s*<\/iframe>\s*$/is', $value, $matches)) {
                return null;
            }

            $value = html_entity_decode($matches[2], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        }

        $parts = parse_url($value);

        if (
            ! is_array($parts)
            || strtolower($parts['scheme'] ?? '') !== 'https'
            || ! in_array(strtolower($parts['host'] ?? ''), ['www.google.com', 'maps.google.com'], true)
            || ($parts['path'] ?? '') !== '/maps/embed'
            || empty($parts['query'])
            || isset($parts['user'])
            || isset($parts['pass'])
            || (isset($parts['port']) && $parts['port'] !== 443)
        ) {
            return null;
        }

        return $value;
    }
}
