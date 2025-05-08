<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;     // Importer le modèle Post
use App\Models\Category; // Importer Category pour lier les posts
use App\Models\User;     // Importer User pour lier l'auteur
use Illuminate\Support\Str; // Pour générer les slugs
use Carbon\Carbon;       // Pour manipuler les dates facilement
use Illuminate\Support\Facades\Hash; // Importer Hash pour bcrypt

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer ou créer l'utilisateur auteur
        $author = User::firstOrCreate(
            ['email' => 'admin@nama.org'], // Critère pour le retrouver s'il existe
            [ // Valeurs à utiliser S'IL FAUT LE CRÉER
                // === MODIFIÉ ICI ===
                // Assurez-vous que les noms de colonnes correspondent à votre migration users
                'first_name' => 'Admin Nama',          // Gardez ceci si la colonne 'name' existe toujours
                'last_name' => 'Admin',         // Ajoutez le prénom
                'last_name' => 'Nama',           // Ajoutez le nom de famille (qui manquait)
                'password' => Hash::make('password'), // Utilisez Hash::make (remplace bcrypt)
                'email_verified_at' => now(),   // Optionnel : marquer l'email comme vérifié
                // === FIN MODIFICATION ===
            ]
        );

        // Récupérer ou créer les catégories
        $category1 = Category::firstOrCreate(
            ['slug->fr' => 'actualites'],
            [
                'name' => ['fr' => 'Actualités', 'ar' => 'الأخبار'],
                'slug' => ['fr' => 'actualites', 'ar' => 'alakhbar']
            ]
        );
        $category2 = Category::firstOrCreate(
            ['slug->fr' => 'rapports'],
            [
                'name' => ['fr' => 'Rapports', 'ar' => 'تقارير'],
                'slug' => ['fr' => 'rapports', 'ar' => 'taqarir']
            ]
        );

        // --- Création des Posts (pas de changement ici) ---
        Post::create([
            'category_id' => $category1->id,
            'user_id' => $author->id,
            'title' => ['fr' => 'Inauguration du Puits N°1', 'ar' => 'افتتاح البئر رقم 1'],
            'slug' => ['fr' => 'inauguration-puits-1', 'ar' => 'iftitah-bier-1'],
            'body' => ['fr' => 'Contenu détaillé de l\'article sur l\'inauguration du premier puits. C\'était un grand moment pour la communauté...', 'ar' => 'محتوى تفصيلي للمقال حول افتتاح البئر الأول. لقد كانت لحظة عظيمة للمجتمع ...'],
            'featured_image_path' => 'posts/inauguration-puits.jpg', // Exemple
            'published_at' => Carbon::parse('2024-04-25 10:00:00'),
            'created_at' => now()->subDays(15),
            'updated_at' => now()->subDays(14),
        ]);

        Post::create([
            'category_id' => $category1->id,
            'user_id' => $author->id,
            'title' => ['fr' => 'Lancement Campagne Éducative', 'ar' => 'إطلاق الحملة التعليمية'],
            'slug' => ['fr' => 'lancement-campagne-educative', 'ar' => 'itlaq-hamla-talimia'],
            'body' => ['fr' => 'Nous sommes heureux d\'annoncer le lancement de notre nouvelle campagne éducative visant à soutenir les écoles locales.', 'ar' => 'يسرنا أن نعلن عن إطلاق حملتنا التعليمية الجديدة لدعم المدارس المحلية.'],
            'featured_image_path' => null,
            'published_at' => now()->subDay(),
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(1),
        ]);

         Post::create([
            'category_id' => $category2->id,
            'user_id' => $author->id,
            'title' => ['fr' => 'Rapport Annuel 2024 (Brouillon)', 'ar' => 'التقرير السنوي 2024 (مسودة)'],
            'slug' => ['fr' => 'rapport-annuel-2024-brouillon', 'ar' => 'taqrir-sanawi-2024-mosawada'],
            'body' => ['fr' => 'Version préliminaire du rapport annuel, en attente de validation finale.', 'ar' => 'النسخة الأولية للتقرير السنوي ، بانتظار المصادقة النهائية.'],
            'featured_image_path' => null,
            'published_at' => null, // Brouillon
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         Post::create([
            'category_id' => $category1->id,
            'user_id' => $author->id,
            'title' => ['fr' => 'Prochain événement : Collecte de fonds', 'ar' => 'الحدث القادم: جمع التبرعات'],
            'slug' => ['fr' => 'evenement-collecte-fonds-juin', 'ar' => 'hadath-jam3-tabaro3at-june'],
            'body' => ['fr' => 'Annonce de notre prochaine collecte de fonds qui aura lieu le mois prochain. Plus de détails bientôt !', 'ar' => 'إعلان عن حملة جمع التبرعات القادمة التي ستعقد الشهر المقبل. المزيد من التفاصيل قريبا!'],
            'featured_image_path' => null,
            'published_at' => now()->addMonths(1), // Programmé
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay(),
        ]);
    }
}