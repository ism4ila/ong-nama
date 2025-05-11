<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteSetting extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'site_name',
        'footer_description',
        'contact_address',
        'footer_copyright_text'
    ];

    protected $fillable = [
        'site_name',
        'footer_description',
        'contact_address',
        'contact_phone',
        'contact_email',
        'contact_map_iframe_url',
        'social_facebook_url',
        'social_twitter_url',
        'social_instagram_url',
        'social_linkedin_url',
        'social_youtube_url',
        'footer_copyright_text',
        'favicon',
        'logo_path',
        'footer_logo_path',
        // Si vous souhaitez stocker les couleurs primaires/secondaires en BDD
        // 'primary_color', 
        // 'secondary_color',
        // 'accent_color',
    ];

    // Valeurs par défaut pour la création si la table est vide
    protected static $defaultSettings = [
        'site_name' => ['en' => 'NAMA', 'fr' => 'NAMA', 'ar' => 'نما'],
        'footer_description' => ['en' => 'Organization dedicated to acting together for a better future.', 'fr' => 'Organisation dédiée à agir ensemble pour un avenir meilleur.', 'ar' => 'منظمة مكرسة للعمل معًا من أجل مستقبل أفضل.'],
        'footer_copyright_text' => ['en' => 'All rights reserved.', 'fr' => 'Tous droits réservés.', 'ar' => 'كل الحقوق محفوظة.'],
        'contact_address' => ['en' => '123 Main Street, City, Country', 'fr' => '123 Rue Principale, Ville, Pays', 'ar' => '123 الشارع الرئيسي، المدينة، الدولة'],
        'contact_phone' => '+123 456 7890',
        'contact_email' => 'contact@nama.org',
        // Valeurs par défaut pour les couleurs si vous les ajoutez
        // 'primary_color' => '#4CAF50',
        // 'secondary_color' => '#2E7D32',
        // 'accent_color' => '#8BC34A',
    ];
    
    public static function instance()
    {
        $settings = self::first();
        if (!$settings) {
            // Créer avec les valeurs par défaut
            $settings = self::create(self::$defaultSettings);
        }
        return $settings;
    }

    /**
     * Détermine la direction du texte pour une locale donnée.
     *
     * @param string|null $locale La locale (ex: 'en', 'fr', 'ar'). Si null, utilise la locale actuelle de l'application.
     * @return string 'ltr' ou 'rtl'.
     */
    public function getDirection(?string $locale = null): string
    {
        $currentLocale = $locale ?? app()->getLocale();
        if (in_array($currentLocale, ['ar', 'he', 'fa', 'ur'])) { // Ajoutez d'autres langues RTL si nécessaire
            return 'rtl';
        }
        return 'ltr';
    }

    // Si vous avez ajouté les champs de couleur à $fillable et à la migration:
    // protected $casts = [
    //     'primary_color' => 'string',
    //     'secondary_color' => 'string',
    //     'accent_color' => 'string',
    // ];
}