<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner; // Importer le modèle Partner

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => [
                'fr' => 'Fondation Solidarité Globale',
                'ar' => 'مؤسسة التضامن العالمي'
            ],
            'description' => [
                'fr' => 'Un partenaire clé dans le financement de projets humanitaires.',
                'ar' => 'شريك رئيسي في تمويل المشاريع الإنسانية.'
            ],
            'logo_path' => '/images/partners/solidarite_globale.png',
            'website_url' => 'https://solidariteglobale.org', // URL d'exemple
            'display_order' => 1,
        ]);

        Partner::create([
            'name' => [
                'fr' => 'Constructeurs Unis',
                'ar' => 'البناؤون المتحدون'
            ],
            'description' => [
                'fr' => 'Experts en construction et ingénierie pour les projets d\'infrastructure.',
                'ar' => 'خبراء في البناء والهندسة لمشاريع البنية التحتية.'
            ],
            'logo_path' => '/images/partners/constructeurs_unis.png',
            'website_url' => 'https://constructeursunis.com', // URL d'exemple
            'display_order' => 2,
        ]);
    }
}