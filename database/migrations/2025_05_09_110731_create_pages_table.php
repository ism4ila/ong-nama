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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // Pour identifier la page, ex: 'about', 'home-what-we-do'
            $table->json('title');           // Titre traduisible
            $table->json('content')->nullable();       // Contenu principal traduisible
            $table->json('meta_title')->nullable();    // Pour le SEO, traduisible
            $table->json('meta_description')->nullable(); // Pour le SEO, traduisible
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};