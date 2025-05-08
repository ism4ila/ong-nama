<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::query()->delete(); // Nettoyer avant de semer

        // Récupérer un utilisateur admin et des catégories pour lier les posts
        $adminUser = User::where('email', 'admin@ongnama.test')->first();
        $newsCategory = Category::where('slug->en', 'news')->first(); // Recherche par slug anglais
        $projectsCategory = Category::where('slug->en', 'projects')->first();

        if (!$adminUser || !$newsCategory || !$projectsCategory) {
            $this->command->error('Admin user or categories not found. Run UserSeeder and CategorySeeder first.');
            return;
        }

        Post::create([
            'category_id' => $newsCategory->id,
            'user_id' => $adminUser->id,
            'title' => [
                'en' => 'Nama Organization Annual Report 2024',
                'fr' => 'Rapport Annuel 2024 de l\'Organisation Nama',
                'ar' => 'التقرير السنوي لمنظمة نما لعام 2024'
            ],
            'excerpt' => [
                'en' => 'Summary of activities and achievements for the year 2024.',
                'fr' => 'Résumé des activités et réalisations pour l\'année 2024.',
                'ar' => 'ملخص الأنشطة والإنجازات لعام 2024.'
            ],
            'body' => [
                'en' => 'Full content of the annual report...',
                'fr' => 'Contenu complet du rapport annuel...',
                'ar' => 'المحتوى الكامل للتقرير السنوي...'
            ],
            'featured_image_url' => '/images/posts/report2024.jpg', // Chemin exemple
            'published_at' => Carbon::parse('2025-01-10 10:00:00'),
        ]);

        Post::create([
            'category_id' => $projectsCategory->id,
            'user_id' => $adminUser->id,
            'title' => [
                'en' => 'Update on the Village X Mosque Project',
                'fr' => 'Mise à jour sur le Projet Mosquée Village X',
                'ar' => 'تحديث حول مشروع مسجد قرية X'
            ],
            'excerpt' => [
                'en' => 'Latest progress on the construction work.',
                'fr' => 'Dernières avancées sur les travaux de construction.',
                'ar' => 'آخر التطورات في أعمال البناء.'
            ],
            'body' => [
                'en' => 'Detailed update on the construction phases...',
                'fr' => 'Mise à jour détaillée sur les phases de construction...',
                'ar' => 'تحديث تفصيلي حول مراحل البناء...'
            ],
            'featured_image_url' => '/images/posts/mosque_update.jpg', // Chemin exemple
            'published_at' => Carbon::parse('2025-03-20 15:30:00'),
        ]);
    }
}