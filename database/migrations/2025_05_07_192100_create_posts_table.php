<?php
// Fichier: database/migrations/2025_05_07_192100_create_posts_table.php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Clé étrangère vers categories
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers users (auteur)
            $table->json('title'); // Titre traduisible
            $table->json('slug'); // Slug traduisible
            $table->json('body'); // Corps de l'article traduisible
            $table->string('featured_image_path')->nullable(); // Chemin image (ou à gérer via medialibrary)
            // Cette colonne détermine le statut de publication !
            $table->timestamp('published_at')->nullable(); // Date et heure de publication (ou NULL si brouillon)
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};