<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::first();
        $categoryMosquees = Category::where('slug->fr', 'construction-mosquees')->first();
        $categoryPuits = Category::where('slug->fr', 'forages-puits')->first();

        if ($author && $categoryMosquees) {
            Post::create([
                'category_id' => $categoryMosquees->id,
                'user_id' => $author->id,
                'title' => [
                    'fr' => 'Lancement du projet Mosquée Al-Nour',
                    'ar' => 'إطلاق مشروع مسجد النور'
                ],
                'slug' => [
                    'fr' => 'lancement-projet-mosquee-al-nour',
                    'ar' => 'إطلاق-مشروع-مسجد-النور'
                ],
                'excerpt' => [
                    'fr' => 'Les travaux pour la nouvelle mosquée Al-Nour ont officiellement commencé.',
                    'ar' => 'بدأت أعمال بناء مسجد النور الجديد رسميًا.'
                ],
                'body_raw' => json_encode([
                    'fr' => 'Contenu détaillé sur le lancement du projet, les premières étapes et les attentes de la communauté.',
                    'ar' => 'محتوى تفصيلي حول إطلاق المشروع، الخطوات الأولى، وتطلعات المجتمع.'
                ]),
                'featured_image' => '/images/posts/lancement_al_nour.jpg',
                'published_at' => now(),
            ]);
        }

        if ($author && $categoryPuits) {
            Post::create([
                'category_id' => $categoryPuits->id,
                'user_id' => $author->id,
                'title' => [
                    'fr' => 'Le Puits Espoir apporte l\'eau à 500 familles',
                    'ar' => 'بئر الأمل يوفر المياه لـ 500 أسرة'
                ],
                'slug' => [
                    'fr' => 'puits-espoir-eau-500-familles',
                    'ar' => 'بئر-الأمل-يوفر-المياه-500-أسرة'
                ],
                'excerpt' => [
                    'fr' => 'Le forage du Puits Espoir est terminé et dessert maintenant la communauté locale.',
                    'ar' => 'اكتمل حفر بئر الأمل وهو يخدم الآن المجتمع المحلي.'
                ],
                'body_raw' => json_encode([
                    'fr' => 'Un regard sur l\'impact positif du Puits Espoir sur la vie quotidienne des habitants du village Z.',
                    'ar' => 'نظرة على التأثير الإيجابي لبئر الأمل على الحياة اليومية لسكان قرية زد.'
                ]),
                'featured_image' => '/images/posts/impact_puits_espoir.jpg',
                'published_at' => now()->subDays(10),
            ]);
        }
    }
}
