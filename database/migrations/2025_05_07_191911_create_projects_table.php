<?php
// Fichier : database/migrations/2025_05_07_191911_create_projects_table.php

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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Titre traduisible
            $table->json('slug'); // Slug traduisible
            $table->json('description_short')->nullable(); // Description courte traduisible
            $table->text('content_full_raw')->nullable(); // Contenu complet (peut-être Markdown ou HTML brut)
            $table->string('status')->default('planned'); // Statut ('planned', 'ongoing', 'completed', etc.)
            $table->date('start_date')->nullable(); // Date de début
            $table->date('end_date')->nullable(); // Date de fin
            $table->json('location_text')->nullable(); // Nom du lieu traduisible
            $table->decimal('latitude', 10, 7)->nullable(); // Coordonnée GPS Latitude
            $table->decimal('longitude', 10, 7)->nullable(); // Coordonnée GPS Longitude
            $table->string('featured_image')->nullable(); // Chemin vers l'image principale (peut-être géré par medialibrary plus tard)
            $table->boolean('is_featured')->default(false); // Pour marquer un projet comme "mis en avant"
            // *** Ajout de la colonne is_active ici, SANS ->after() ***
            $table->boolean('is_active')->default(true); // Pour contrôler la visibilité sur le site public
            $table->timestamps(); // Ajoute created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};