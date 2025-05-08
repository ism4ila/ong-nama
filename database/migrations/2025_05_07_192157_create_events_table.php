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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Titre multilingue
            $table->text('description_raw')->nullable(); // Description (brut)
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime')->nullable();
            $table->json('location')->nullable(); // Lieu multilingue
            $table->timestamps();
        });
    }
    // La méthode down() : Schema::dropIfExists('events');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
