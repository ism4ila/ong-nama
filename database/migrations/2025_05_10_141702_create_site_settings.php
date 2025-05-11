<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id(); // Unique record
            $table->json('site_name')->nullable(); // Translatable
            $table->json('footer_description')->nullable();
            $table->json('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_map_iframe_url')->nullable(); // Pour une carte Google Maps par exemple

            $table->string('social_facebook_url')->nullable();
            $table->string('social_twitter_url')->nullable();
            $table->string('social_instagram_url')->nullable();
            $table->string('social_linkedin_url')->nullable();
            $table->string('social_youtube_url')->nullable(); 
            // Ajoutez d'autres réseaux si besoin

            $table->json('footer_copyright_text')->nullable();
            $table->string('favicon')->nullable(); // Chemin vers le favicon
            $table->string('logo_path')->nullable(); // Chemin vers le logo principal (utilisé dans la navbar)
            $table->string('footer_logo_path')->nullable(); // Chemin vers un logo spécifique pour le footer

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};