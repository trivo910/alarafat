<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->foreignId('package_id')->nullable()->constrained()->nullOnDelete();
            $table->string('package_name')->nullable();
            $table->text('message')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropConstrainedForeignId('package_id');
            $table->dropColumn(['package_name', 'message']);
        });
    }
};
