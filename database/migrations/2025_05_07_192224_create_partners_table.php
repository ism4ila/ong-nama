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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Nom du partenaire multilingue
            $table->json('description')->nullable(); // Description multilingue
            $table->string('logo_path')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }
    // La méthode down() : Schema::dropIfExists('partners');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
