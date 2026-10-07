<?php

namespace App\Models;

use App\Support\GoogleMapsEmbed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'categories',
        'price',
        'featured_image',
        'image_alt_text',
        'description',
        'status',
        'show_in_trending',
        'duration',
        'tour_type',
        'group_size',
        'languages',
        'map_embed',
        'gallery_images',
        'included',
        'excluded',
        'itinerary',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'show_in_trending' => 'boolean',
        'categories' => 'array',
        'gallery_images' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'itinerary' => 'array',
    ];

    public function getFeaturedImageUrlAttribute(): ?string
    {
        $image = $this->featured_image;

        if (! $image) {
            return null;
        }

        if (Str::startsWith($image, ['http://', 'https://', '//', '/'])) {
            return $image;
        }

        return asset('storage/'.$image);
    }

    public function getMapEmbedUrlAttribute(): ?string
    {
        return GoogleMapsEmbed::extractUrl($this->map_embed);
    }
}
