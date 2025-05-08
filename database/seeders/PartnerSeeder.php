<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner; // Assurez-vous que le modèle est importé

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => ['fr' => 'Fondation XYZ', 'ar' => 'مؤسسة XYZ'],
            'description' => ['fr' => 'Partenaire principal pour les projets éducatifs.', 'ar' => 'الشريك الرئيسي للمشاريع التعليمية.'],
            'logo_path' => 'partners/logo_xyz.png', // Assurez-vous que ce chemin est correct/géré
            'website_url' => 'https://xyzfoundation.org',
            'display_order' => 1,
            'is_active' => true, // Nouveau champ ajouté
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Partner::create([
            'name' => ['fr' => 'Association Eau Claire', 'ar' => 'جمعية المياه النقية'],
            'description' => ['fr' => 'Collaboration sur les projets d\'accès à l\'eau.', 'ar' => 'التعاون في مشاريع الوصول إلى المياه.'],
            'logo_path' => 'partners/logo_eau_claire.jpg',
            'website_url' => 'https://eauclaire.org',
            'display_order' => 2,
            'is_active' => true, // Nouveau champ ajouté
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         Partner::create([
            'name' => ['fr' => 'Ancien Partenaire ABC', 'ar' => 'الشريك السابق ABC'],
            'description' => ['fr' => 'Partenariat terminé.', 'ar' => 'انتهت الشراكة.'],
            'logo_path' => 'partners/logo_abc.png',
            'website_url' => null,
            'display_order' => 3,
            'is_active' => false, // Exemple de partenaire inactif
            'created_at' => now()->subYear(), // Créé il y a un an
            'updated_at' => now()->subYear(),
        ]);

        // Ajoutez d'autres partenaires si nécessaire...
    }
}