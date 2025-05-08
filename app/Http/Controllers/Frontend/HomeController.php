<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Post;
use App\Models\Partner;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil publique.
     * Récupère les 3 derniers projets créés, les 3 derniers posts créés,
     * et tous les partenaires triés par ordre d'affichage, sans filtre d'activité ou de publication.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Récupérer les 3 derniers projets créés (SANS condition 'is_active')
        $latestProjects = Project::with('mediaItems')
                                 // ->where('is_active', true) // Condition 'is_active' supprimée
                                 ->latest()                 // Tri par date de création la plus récente
                                 ->take(3)
                                 ->get();

        // Récupérer les 3 derniers articles créés (SANS conditions de publication)
        $latestPosts = Post::with(['user', 'category', 'mediaItems'])
                           // ->whereNotNull('published_at')      // Condition de publication supprimée
                           // ->where('published_at', '<=', now()) // Condition de publication supprimée
                           ->latest()                          // Tri par date de création la plus récente (comportement par défaut de latest())
                           ->take(3)
                           ->get();

        // Récupérer TOUS les partenaires triés par ordre d'affichage (SANS condition 'is_active')
        $partners = Partner::query() // On commence par query() pour pouvoir juste ordonner
                           // ->where('is_active', true) // Condition 'is_active' supprimée
                           ->orderBy('display_order', 'asc')
                           ->get();

        // Passer les données à la vue 'frontend.home'
        return view('frontend.home', compact(
            'latestProjects',
            'latestPosts',
            'partners'
        ));
    }
}