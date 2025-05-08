<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Importer le modèle Category

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => [
                'fr' => 'Construction de Mosquées',
                'ar' => 'بناء المساجد'
            ],
            'slug' => [
                'fr' => 'construction-mosquees',
                'ar' => 'بناء-المساجد'
            ]
        ]);

        Category::create([
            'name' => [
                'fr' => 'Forages de Puits',
                'ar' => 'حفر الآبار'
            ],
            'slug' => [
                'fr' => 'forages-puits',
                'ar' => 'حفر-الآبار'
            ]
        ]);

        Category::create([
            'name' => [
                'fr' => 'Complexes Islamiques',
                'ar' => 'المجمعات الإسلامية'
            ],
            'slug' => [
                'fr' => 'complexes-islamiques',
                'ar' => 'المجمعات-الإسلامية'
            ]
        ]);

        // Vous pouvez ajouter d'autres catégories ici
    }
}