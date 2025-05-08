<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;   // <-- Importer le modèle Project
use App\Models\Post;      // <-- Importer le modèle Post
use App\Models\Event;     // <-- Importer le modèle Event
use App\Models\Partner;   // <-- Importer le modèle Partner

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil publique.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // 1. Récupérer les derniers projets (par exemple, les 3 plus récents)
        $latestProjects = Project::latest() // Tri par created_at descendant
                                   ->take(3)       // Limiter à 3 résultats
                                   ->get();      // Exécuter la requête

        // 2. Récupérer les derniers articles publiés (par exemple, les 3 plus récents)
        $latestPosts = Post::whereNotNull('published_at') // Seulement les articles publiés
                           ->where('published_at', '<=', now()) // Date de publication passée ou présente
                           ->latest('published_at') // Tri par date de publication descendante
                           ->take(3)
                           ->get();

        // 3. Récupérer les prochains événements (par exemple, les 3 plus proches)
        $upcomingEvents = Event::where('start_datetime', '>=', now()) // Événements futurs ou en cours
                               ->orderBy('start_datetime', 'asc')   // Tri par date de début ascendante
                               ->take(3)
                               ->get();

        // 4. Récupérer les partenaires (par exemple, tous, triés par ordre d'affichage)
        $partners = Partner::orderBy('display_order', 'asc') // Tri par display_order
                           ->get();

        // 5. Passer toutes les données récupérées à la vue
        return view('frontend.home', compact(
            'latestProjects',
            'latestPosts',
            'upcomingEvents',
            'partners'
            // Ajoutez d'autres variables si nécessaire
        ));
    }
}