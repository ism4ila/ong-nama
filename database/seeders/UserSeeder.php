<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur administrateur/auteur
        User::create([
            'name' => 'ISMAILA', // Prénom uniquement
            'last_name' => 'HAMADOU', // Ajout du nom de famille
            'email' => 'ismailahamadou5@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        // Vous pouvez créer d'autres utilisateurs si nécessaire
        // User::create([
        //     'name' => 'Auteur',
        //     'last_name' => 'Test',
        //     'email' => 'auteur@nama.org',
        //     'password' => Hash::make('password123'),
        //     'email_verified_at' => now(),
        // ]);
    }
}