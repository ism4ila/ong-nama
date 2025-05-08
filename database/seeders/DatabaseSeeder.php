<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,    // Important de le mettre avant les seeders qui utilisent User
            CategorySeeder::class, // Important de le mettre avant PostSeeder
            ProjectSeeder::class,
            PostSeeder::class,
            EventSeeder::class,
            PartnerSeeder::class,
            // Vous pourrez ajouter MediaItemSeeder ici si vous en créez un plus tard
        ]);
    }
}