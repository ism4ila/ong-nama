<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description', 'location'];

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'location',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];

    // Relation : Un événement peut avoir plusieurs éléments médias
    public function mediaItems()
    {
        return $this->morphMany(MediaItem::class, 'model');
    }
}