<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // Importer le trait

class Project extends Model
{
    use HasFactory, HasTranslations; // Utiliser les traits

    // Champs traduisibles
    public $translatable = ['title', 'slug', 'description_short', 'content_full', 'location_text'];

    // Champs autorisés à l'assignation de masse
    protected $fillable = [
        'title',
        'slug',
        'description_short',
        'content_full',
        'status',
        'start_date',
        'end_date',
        'location_text',
        'latitude',
        'longitude',
        'featured_image',
        'is_featured',
    ];

    // Casts pour les types de données
    protected $casts = [
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'latitude' => 'decimal:7', // Préciser le nombre de décimales
        'longitude' => 'decimal:7',
        // Les champs JSON traduisibles sont gérés par le package, pas besoin de les caster en 'array' ici
    ];

    // Relation : Un projet peut avoir plusieurs éléments médias
    public function mediaItems()
    {
        return $this->morphMany(MediaItem::class, 'model');
    }
    // Dans App\Models\Project.php
    public function getRouteKeyName()
    {
        return 'slug'; // Indique à Laravel d'utiliser le champ 'slug' pour le binding
    }
}
