<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // Assurez-vous que cette ligne est présente

class Event extends Model
{
    use HasFactory;
    use HasTranslations; // Assurez-vous que cette ligne est présente

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',              // Ajouté
        'description',        // Ajouté
        'start_datetime',
        'end_datetime',
        'location_text',      // Ajouté
        'featured_image_url'
    ];

    /**
     * Les attributs qui doivent être traduisibles.
     *
     * @var array<int, string>
     */
    public $translatable = ['title', 'description', 'location_text'];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_datetime' => 'datetime', // Conservez les casts existants
        'end_datetime' => 'datetime',
        // Ne pas caster les champs traduisibles ici
    ];

    // Ajoutez ici d'autres relations ou méthodes si nécessaire
}