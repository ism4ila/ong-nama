<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// --- Contrôleurs ---
// Pour la page d'accueil publique
use App\Http\Controllers\HomeController; // <<< Nouveau HomeController pour le public

// Pour les autres pages publiques
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\PartnerController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;
use App\Http\Controllers\Frontend\EventController as FrontendEventController;


// Pour la partie authentifiée
use App\Http\Controllers\DashboardController; // <<< Ancien HomeController renommé
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CategoryController; // Ajustement de l'importation

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTES PUBLIQUES (FRONTEND) ---
// NOUVELLE ROUTE pour la page d'accueil publique
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');


Route::get('/about', [AboutPageController::class, 'index'])->name('about.public');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/about', [AboutPageController::class, 'index'])->name('frontend.about');

// Page "Actualités" (Posts)
Route::get('/news', [FrontendPostController::class, 'index'])->name('frontend.posts.index'); // URL en anglais
Route::get('/news/{slug}', [FrontendPostController::class, 'show'])->name('frontend.posts.show'); // Le {slug} sera celui de la langue active
Route::get('/projets', [FrontendProjectController::class, 'index'])->name('frontend.projects.index');
Route::get('/projets/{slug}', [FrontendProjectController::class, 'show'])->name('frontend.projects.show');

Route::get('/evenements', [FrontendEventController::class, 'index'])->name('frontend.events.index');
Route::get('/evenements/{slug}', [FrontendEventController::class, 'show'])->name('frontend.events.show');

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
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        // Autres routes admin ici...
    });

    Route::get('/about', function () {
        return view('about');
    })->name('about');
});