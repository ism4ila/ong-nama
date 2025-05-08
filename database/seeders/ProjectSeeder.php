<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project; // Assurez-vous que le modèle est importé
use Carbon\Carbon; // Pour manipuler les dates
use Illuminate\Support\Str; // Pour générer les slugs

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => ['fr' => 'Construction Puits N°1', 'ar' => 'بناء البئر رقم 1'],
            'slug' => ['fr' => Str::slug('Construction Puits N°1'), 'ar' => Str::slug('بناء البئر رقم 1', '-', 'ar')], // Génère le slug
            // 'description' => [...], // ANCIEN CHAMP INCORRECT - SUPPRIMÉ
            'description_short' => ['fr' => 'Description courte du projet de construction du puits N°1 achevé.', 'ar' => 'وصف قصير لمشروع بناء البئر رقم 1 المكتمل.'], // NOUVEAU CHAMP
            'content_full_raw' => 'Contenu détaillé sur la construction du puits N°1...', // NOUVEAU CHAMP (si vous l'avez)
            'status' => 'completed', // ongoing, completed, planned
            'start_date' => Carbon::parse('2024-01-15'),
            'end_date' => Carbon::parse('2024-04-20'),
            'location_text' => ['fr' => 'Village A, Région X', 'ar' => 'قرية أ ، منطقة س'], // NOUVEAU CHAMP (si vous l'avez)
            'latitude' => 3.8667,
            'longitude' => 11.5167,
            // 'main_image_path' => null, // ANCIEN CHAMP INCORRECT - SUPPRIMÉ (si renommé)
            'featured_image' => null, // NOUVEAU CHAMP (si renommé)
            'is_featured' => false, // NOUVEAU CHAMP (si vous l'avez)
            'is_active' => true, // Champ ajouté par la migration séparée
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Project::create([
            'title' => ['fr' => 'Centre Éducatif Espoir', 'ar' => 'مركز الأمل التعليمي'],
            'slug' => ['fr' => Str::slug('Centre Éducatif Espoir'), 'ar' => Str::slug('مركز الأمل التعليمي', '-', 'ar')],
            'description_short' => ['fr' => 'Création d\'un centre éducatif complet pour les enfants.', 'ar' => 'إنشاء مركز تعليمي متكامل للأطفال.'],
            'content_full_raw' => 'Détails complets sur le projet du centre éducatif Espoir...',
            'status' => 'ongoing',
            'start_date' => Carbon::parse('2024-09-01'),
            'end_date' => null,
            'location_text' => ['fr' => 'Ville B, Région Y', 'ar' => 'مدينة ب ، منطقة ص'],
            'latitude' => 4.0500,
            'longitude' => 9.7000,
            'featured_image' => 'images/projects/centre-espoir.jpg', // Exemple de chemin d'image
            'is_featured' => true, // Exemple de projet mis en avant
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         Project::create([
            'title' => ['fr' => 'Mosquée Lumière (Planifié)', 'ar' => 'مسجد النور (مخطط له)'],
            'slug' => ['fr' => Str::slug('Mosquée Lumière Planifié'), 'ar' => Str::slug('مسجد النور مخطط له', '-', 'ar')],
            'description_short' => ['fr' => 'Planification de la construction d\'une nouvelle mosquée.', 'ar' => 'تخطيط لبناء مسجد جديد.'],
            'content_full_raw' => null,
            'status' => 'planned',
            'start_date' => null,
            'end_date' => null,
            'location_text' => null,
            'latitude' => null,
            'longitude' => null,
            'featured_image' => null,
            'is_featured' => false,
            'is_active' => false, // Exemple de projet inactif
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ajoutez d'autres projets si nécessaire en respectant les noms de colonnes...
    }
}