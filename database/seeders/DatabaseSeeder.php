<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // L'ordre est important ici :
        $this->call([
            UserSeeder::class,         // Créer les utilisateurs d'abord
            CategorySeeder::class,     // Puis les catégories
            ProjectSeeder::class,      // Ensuite les projets (indépendant pour l'instant)
            EventSeeder::class,        // Les événements (indépendant)
            PartnerSeeder::class,      // Les partenaires (indépendant)
            PostSeeder::class,         // Les articles APRÈS Users et Categories
            // MediaItemSeeder::class, // Ajoutez ceci plus tard si nécessaire
        ]);
    }
}