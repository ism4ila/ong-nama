<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// --- Contrôleurs ---
// Pour la page d'accueil publique
use App\Http\Controllers\HomeController; // <<< Nouveau HomeController pour le public

// Pour les autres pages publiques
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PartnerController;

// Pour la partie authentifiée
use App\Http\Controllers\DashboardController; // <<< Ancien HomeController renommé
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTES PUBLIQUES (FRONTEND) ---
Route::get('/', [HomeController::class, 'index'])->name('home.public'); // <<< Page d'accueil publique

Route::get('/about', [AboutPageController::class, 'index'])->name('about.public');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact.public');


// --- ROUTES D'AUTHENTIFICATION ---
Auth::routes();


// --- ROUTES POUR UTILISATEURS AUTHENTIFIÉS (standard & admin) ---
Route::middleware('auth')->group(function () {

    // Tableau de bord standard pour utilisateur connecté (ancien HomeController)
    Route::get('/home', [DashboardController::class, 'index'])->name('home'); // <<< Modifié ici

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // --- ROUTES POUR L'ADMINISTRATION (SB Admin) ---
    Route::prefix('admin')
         ->name('admin.')
         // ->middleware('isAdmin') // À ajouter plus tard
         ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Autres routes admin ici...
    });

    Route::get('/about', function () {
        return view('about');
    })->name('about');
});