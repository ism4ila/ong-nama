<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// --- Contrôleurs Frontend ---
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\AboutPageController as FrontendAboutPageController; // Peut être remplacé par PageController
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController; // Pour les "Actualités"
use App\Http\Controllers\Frontend\EventController as FrontendEventController;
use App\Http\Controllers\Frontend\PartnerController as FrontendPartnerController; // Si vous avez une page listant les partenaires
use App\Http\Controllers\Frontend\PageController as FrontendPageController; // Pour les pages dynamiques
use App\Http\Controllers\Frontend\ContactController as FrontendContactController; // Pour le formulaire de contact
use App\Http\Controllers\Admin\EventController as AdminEventController; 

// --- Contrôleurs Backend/Authentification ---
use App\Http\Controllers\DashboardController; // Pour le tableau de bord utilisateur après login (/home)
use App\Http\Controllers\ProfileController;
// Les contrôleurs Admin sont typiquement dans un sous-dossier Admin, ex: App\Http\Controllers\Admin\DashboardController
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController; // Assurez-vous que le namespace est correct
use App\Http\Controllers\Admin\PostController as AdminPostController;       // Assurez-vous que le namespace est correct
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

// Ajoutez ici les autres contrôleurs Admin (Project, Event, Page, Settings etc.)

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTES PUBLIQUES (FRONTEND) ---
// Toutes les routes frontend devraient être dans ce groupe pour bénéficier du middleware SetLocale
Route::group(['middleware' => ['web', 'set_locale']], function () {

    Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');

    // Actualités (Posts)
    Route::get('/news', [FrontendPostController::class, 'index'])->name('frontend.posts.index');
    // Pour {post:slug}, assurez-vous que votre modèle Post utilise bien 'slug' comme clé de route
    // et que la résolution de slug traduit fonctionne ou est gérée dans le contrôleur.
    Route::get('/news/{post:slug}', [FrontendPostController::class, 'show'])->name('frontend.posts.show');

    // Projets
    Route::get('/projects', [FrontendProjectController::class, 'index'])->name('frontend.projects.index');
    Route::get('/projects/{project:slug}', [FrontendProjectController::class, 'show'])->name('frontend.projects.show');

    // Événements
    Route::get('/events', [FrontendEventController::class, 'index'])->name('frontend.events.index');
    Route::get('/events/{event:slug}', [FrontendEventController::class, 'show'])->name('frontend.events.show');

    // Partenaires (si une page dédiée existe)
    // Route::get('/partners', [FrontendPartnerController::class, 'index'])->name('frontend.partners.index');

    // Contact (si vous utilisez un contrôleur pour la page de contact)
    Route::get('/contact', [FrontendContactController::class, 'index'])->name('frontend.contact.index');
    Route::post('/contact', [FrontendContactController::class, 'store'])->name('frontend.contact.store');
    // Dans routes/web.php, à l'intérieur du groupe SetLocale
    // Événements - CORRIGÉ : une seule définition de route
    // Événements - CORRIGÉ
    Route::get('/events', [FrontendEventController::class, 'index'])->name('frontend.events.index');
    Route::get('/events/{event_slug}', [FrontendEventController::class, 'show'])->name('frontend.events.show');
    // Route pour "À Propos" - sera gérée par PageController si 'about' est un slug dans la table Pages
    // Si vous voulez garder un contrôleur dédié pour /about :
    // Route::get('/about', [FrontendAboutPageController::class, 'index'])->name('frontend.about');

    // Route pour les PAGES DYNAMIQUES (IMPORTANT: doit être déclarée APRÈS les autres routes plus spécifiques)
    // Elle essaiera de trouver une page correspondant au slug.
    Route::get('/{slug}', [FrontendPageController::class, 'show'])
        ->where('slug', '^[a-zA-Z0-9_\-\/]+$') // Permet les slugs avec des / pour des sous-pages simples. Ajustez si besoin.
        ->name('frontend.page.show');
});


// --- ROUTES D'AUTHENTIFICATION ---
// Auth::routes() configure les routes de login, register, password reset, etc.
// Si vous avez des besoins spécifiques (ex: désactiver l'enregistrement), vous pouvez les déclarer manuellement.
Auth::routes(['verify' => true]); // 'verify' => true active la vérification d'email si vous l'utilisez.


Route::middleware(['auth', 'verified', 'set_locale'])->group(function () {

    // Tableau de bord standard pour utilisateur connecté (route /home)
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // --- ROUTES POUR L'ADMINISTRATION (SB Admin) ---
    // Le préfixe 'admin' assure que ces routes ne sont pas confondues avec les routes publiques.
    Route::prefix('admin')
          ->name('admin.') // Préfixe pour les noms de route: admin.dashboard, admin.posts.index, etc.
          // ->middleware('isAdmin') // À décommenter et implémenter pour la sécurité
          ->group(function () {
        
        // Tableau de bord Admin
        // Assurez-vous que App\Http\Controllers\Admin\DashboardController existe et a une méthode index.
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Ressources CRUD Admin
        Route::resource('categories', CategoryController::class); // Venait de votre code original
        
        // Pour les posts admin, assurez-vous que AdminPostController est celui que vous voulez utiliser
        // Si App\Http\Controllers\PostController était pour l'admin dans votre code original,
        // il faudrait l'importer avec l'alias AdminPostController ou créer le contrôleur Admin\PostController.
        Route::resource('posts', PostController::class); 
        
        Route::resource('events', AdminEventController::class);
        
        // Ajoutez ici les routes pour les autres CRUDs admin (projets, pages, etc.)
        // Route::resource('projects', AdminProjectController::class);
        // Route::resource('pages', AdminPageController::class);
        // ... etc.
    });
});