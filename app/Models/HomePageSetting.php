<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomePageSetting extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'hero_title', 
        'hero_subtitle', 
        'hero_button_text',
        'newsletter_title',
        'newsletter_text',
        'latest_projects_title',
        'latest_posts_title',
        'upcoming_events_title',
        'partners_title',
    ];

    // Assurez-vous que la table n'aura qu'un seul enregistrement.
    // Clé primaire simple 'id' est ok, mais votre logique doit assurer l'unicité.
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_link',
        'hero_background_image',
        'newsletter_title',
        'newsletter_text',
        'latest_projects_title',
        'latest_posts_title',
        'upcoming_events_title',
        'partners_title',
    ];

    // Valeurs par défaut pour la création si la table est vide.
    protected static $defaultSettings = [
        'hero_title' => ['en' => 'Welcome to NAMA Organization', 'fr' => 'Bienvenue à l\'Organisation Nama', 'ar' => 'مرحباً بكم في منظمة نما'],
        'hero_subtitle' => ['en' => 'Acting together for a better future.', 'fr' => 'Agir ensemble pour un avenir meilleur.', 'ar' => 'نعمل معاً من أجل مستقبل أفضل.'],
        'hero_button_text' => ['en' => 'Discover Our Projects', 'fr' => 'Découvrir nos Projets', 'ar' => 'اكتشف مشاريعنا'],
        'hero_button_link' => '/projects', // Ou utilisez route('frontend.projects.index') si possible dans ce contexte
        'newsletter_title' => ['en' => 'Stay informed of our activities', 'fr' => 'Restez informé de nos activités', 'ar' => 'ابق على اطلاع بأنشطتنا'],
        'newsletter_text' => ['en' => 'Subscribe to our newsletter to receive the latest news and updates.', 'fr' => 'Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et mises à jour.', 'ar' => 'اشترك في النشرة الإخبارية لدينا لتلقي آخر الأخبار والتحديثات.'],
        'latest_projects_title' => ['en' => 'Our Latest Projects', 'fr' => 'Nos Derniers Projets', 'ar' => 'أحدث مشاريعنا'],
        'latest_posts_title' => ['en' => 'Latest News', 'fr' => 'Dernières Actualités', 'ar' => 'آخر الأخبار'],
        'upcoming_events_title' => ['en' => 'Upcoming Events', 'fr' => 'Événements à Venir', 'ar' => 'الأحداث القادمة'],
        'partners_title' => ['en' => 'Our Partners', 'fr' => 'Nos Partenaires', 'ar' => 'شركاؤنا'],
    ];
    
    public static function instance()
    {
        // Crée ou récupère le premier enregistrement. S'assure qu'il n'y en a qu'un.
        // Pour que firstOrCreate fonctionne bien avec les traductions,
        // il est préférable de ne pas mettre les champs traduisibles dans le premier array.
        $settings = self::first();
        if (!$settings) {
            $settings = self::create(self::$defaultSettings);
        }
        return $settings;
    }
}