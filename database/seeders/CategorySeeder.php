<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->delete(); // Nettoyer avant de semer

        Category::create([
            'name' => ['en' => 'News', 'fr' => 'Actualités', 'ar' => 'أخبار'],
            'slug' => ['en' => 'news', 'fr' => 'actualites', 'ar' => 'akhbar']
        ]);

        Category::create([
            'name' => ['en' => 'Projects', 'fr' => 'Projets', 'ar' => 'مشاريع'],
            'slug' => ['en' => 'projects', 'fr' => 'projets', 'ar' => 'masharie']
        ]);

        Category::create([
            'name' => ['en' => 'Events', 'fr' => 'Événements', 'ar' => 'فعاليات'],
            'slug' => ['en' => 'events', 'fr' => 'evenements', 'ar' => 'faaliat']
        ]);
    }
}