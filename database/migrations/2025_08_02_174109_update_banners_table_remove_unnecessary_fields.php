<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            // Drop unnecessary columns
            $table->dropColumn(['title', 'description', 'button_text', 'button_url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            // Add back columns if rollback is needed
            $table->string('title')->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('button_text')->default('Daftar Sekarang')->after('description');
            $table->string('button_url')->nullable()->after('button_text');
        });
    }
};
