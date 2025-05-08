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
            // Clé étrangère pour la catégorie (assurez-vous que la table 'categories' existe)
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
             // Clé étrangère pour l'utilisateur (auteur) (assurez-vous que la table 'users' existe)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('title'); // Champ traduisible
            $table->json('excerpt')->nullable(); // Champ traduisible
            $table->json('body'); // Champ traduisible
            $table->string('featured_image_url')->nullable(); // Nom standardisé
            $table->timestamp('published_at')->nullable(); // Date de publication
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