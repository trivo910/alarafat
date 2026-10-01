<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'featured_image',
        'image_alt_text',
        'content',
        'meta_title',
        'meta_description',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
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

        return asset('storage/' . $image);
    }
}
