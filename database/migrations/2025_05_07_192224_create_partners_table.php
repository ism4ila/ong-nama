<?php
// database/migrations/2025_05_07_192224_create_partners_table.php

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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Nom traduisible
            $table->json('description')->nullable(); // Description traduisible
            $table->string('logo_path')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('display_order')->default(0);
            // PAS DE COLONNE 'is_active' ICI !
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};