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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Titre multilingue
            $table->json('slug');  // Slug multilingue
            $table->json('description_short')->nullable(); // Description courte multilingue
            $table->text('content_full_raw')->nullable(); // Contenu détaillé (brut, la traduction sera gérée via le modèle)
            $table->string('status')->default('planned'); // planned, ongoing, completed
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('location_text')->nullable(); // Lieu texte multilingue
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }
    // La méthode down() devrait être : Schema::dropIfExists('projects');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
