<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; // Si vous voulez lister les catégories ou filtrer par catégorie

class PostController extends Controller
{
    // Afficher la liste des articles publiés
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
                     ->where('published_at', '<=', now()) // Uniquement les articles publiés
                     ->latest()
                     ->paginate(10);
        $categories = Category::all(); // Pour un éventuel filtre ou une liste de catégories
        return view('frontend.blog.index', compact('posts', 'categories')); // Vue: resources/views/frontend/blog/index.blade.php
    }

    // Afficher un article spécifique
    public function show(Post $post) // Route Model Binding
    {
        // Assurez-vous que seuls les articles publiés sont accessibles, ou gérez la logique ici
        if (!$post->published_at || $post->published_at->isFuture()) {
            abort(404);
        }
        return view('frontend.blog.show', compact('post')); // Vue: resources/views/frontend/blog/show.blade.php
    }
}