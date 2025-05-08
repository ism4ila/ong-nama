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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Clé étrangère vers categories
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers users (auteurs)
            $table->json('title'); // Titre multilingue
            $table->json('slug');  // Slug multilingue
            $table->json('excerpt')->nullable(); // Résumé multilingue
            $table->text('body_raw')->nullable(); // Contenu complet (brut)
            $table->string('featured_image')->nullable();
            $table->timestamp('published_at')->nullable(); // Pour la planification
            $table->timestamps();
        });
    }
    // La méthode down() : Schema::dropIfExists('posts');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
