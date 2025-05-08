<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'slug', 'excerpt', 'body'];

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'featured_image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relation : Un article appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation : Un article appartient à un utilisateur (auteur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : Un article peut avoir plusieurs éléments médias
    public function mediaItems()
    {
        return $this->morphMany(MediaItem::class, 'model');
    }
    // Dans App\Models\Post.php
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
