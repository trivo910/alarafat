<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false);
            $table->boolean('show_in_trending')->default(false);
            $table->string('duration')->nullable();
            $table->string('tour_type')->nullable();
            $table->string('group_size')->nullable();
            $table->string('languages')->nullable();
            $table->longText('map_embed')->nullable();
            $table->json('gallery_images')->nullable();
            $table->json('included')->nullable();
            $table->json('excluded')->nullable();
            $table->json('itinerary')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn([
                'is_featured',
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
            ]);
        });
    }
};