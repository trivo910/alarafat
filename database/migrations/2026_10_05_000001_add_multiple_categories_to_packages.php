<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->json('categories')->nullable();
        });

        DB::table('packages')
            ->select('id', 'category')
            ->orderBy('id')
            ->chunkById(100, function ($packages): void {
                foreach ($packages as $package) {
                    DB::table('packages')
                        ->where('id', $package->id)
                        ->update(['categories' => json_encode([$package->category], JSON_THROW_ON_ERROR)]);
                }
            });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('categories');
        });
    }
};
