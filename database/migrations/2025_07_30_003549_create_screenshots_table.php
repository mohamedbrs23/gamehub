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
       // database/migrations/..._create_screenshots_table.php
Schema::create('screenshots', function (Blueprint $table) {
    $table->id();
    $table->foreignId('game_id')->constrained()->onDelete('cascade');
    $table->string('image_url'); // Changé de image_path à image_url
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screenshots');
    }
};
