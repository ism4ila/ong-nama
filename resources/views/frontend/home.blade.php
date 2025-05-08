<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nama') }} - {{ __('Accueil') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Intégrer vos fichiers CSS compilés ici --}}
    {{-- Exemple avec Vite: @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Exemple CDN Bootstrap --}}
     <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> {{-- Assurez-vous que ce fichier existe ou commentez/supprimez cette ligne --}}

    {{-- Styles spécifiques (si nécessaire plus tard) --}}
    {{-- @stack('styles') --}}
</head>
<body>
    <div id="app">
        {{-- Section Navigation (simplifiée) --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Nama') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">{{ __('Accueil') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('À Propos') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Projets') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Actualités') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Contact') }}</a></li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item dropdown">
                            <a id="navbarDropdownLang" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLang">
                                <a class="dropdown-item" href="#">FR</a>
                                <a class="dropdown-item" href="#">AR</a>
                            </div>
                        </li>
                         @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Admin') }}</a>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Contenu principal de la page d'accueil --}}
        <main class="py-4">
            <div class="container">

                {{-- Section Bannière/Hero --}}
                <div class="row mb-4">
                    <div class="col-12 text-center bg-light p-5 rounded">
                        <h1>{{ __('Bienvenue à l\'Organisation Nama') }}</h1>
                        <p>{{ __('Agir ensemble pour un avenir meilleur.') }}</p>
                        <a href="#" class="btn btn-primary btn-lg">{{ __('Découvrir nos Projets') }}</a>
                    </div>
                </div>

                {{-- Section Derniers Projets --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <h2>{{ __('Nos Derniers Projets') }}</h2>
                        <hr>
                    </div>
                    @forelse ($latestProjects as $project)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset($project->featured_image_url ?? 'images/placeholder.jpg') }}" class="card-img-top" alt="{{ $project->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                    <p><small>{{ __('Statut:') }} {{ $project->status }}</small></p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">{{ __('En savoir plus') }}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>{{ __('Aucun projet à afficher pour le moment.') }}</p>
                        </div>
                    @endforelse
                </div>

                {{-- Section Dernières Actualités --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <h2>{{ __('Dernières Actualités') }}</h2>
                        <hr>
                    </div>
                    @forelse ($latestPosts as $post)
                        <div class="col-md-4 mb-3">
                             <div class="card">
                                @if($post->featured_image_url)
                                <img src="{{ asset($post->featured_image_url) }}" class="card-img-top" alt="{{ $post->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p><small>{{ __('Publié le:') }} {{ $post->published_at->format('d/m/Y') }}</small></p>
                                    <p class="card-text">{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}</p>
                                    <a href="#" class="btn btn-sm btn-outline-secondary">{{ __('Lire la suite') }}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>{{ __('Aucune actualité à afficher pour le moment.') }}</p>
                        </div>
                    @endforelse
                </div>

                 {{-- Section Événements à Venir --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <h2>{{ __('Événements à Venir') }}</h2>
                        <hr>
                    </div>
                    @forelse ($upcomingEvents as $event)
                        <div class="col-md-4 mb-3">
                             <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <p><small>{{ __('Date:') }} {{ $event->start_datetime->format('d/m/Y H:i') }}</small></p>
                                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                    <a href="#" class="btn btn-sm btn-outline-info">{{ __('Voir les détails') }}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>{{ __('Aucun événement à venir pour le moment.') }}</p>
                        </div>
                    @endforelse
                </div>

                {{-- Section Partenaires --}}
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2>{{ __('Nos Partenaires') }}</h2>
                        <hr>
                         @if ($partners->isNotEmpty())
                            <div>
                                @foreach ($partners as $partner)
                                    <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer" title="{{ $partner->name }}" class="d-inline-block m-2">
                                        <img src="{{ asset($partner->logo_url) }}" alt="{{ $partner->name }}" style="max-height: 60px; max-width: 150px; object-fit: contain;">
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p>{{ __('Nos partenaires seront bientôt affichés ici.') }}</p>
                        @endif
                    </div>
                </div>

            </div> {{-- Fin container principal --}}
        </main>

        {{-- Section Footer (simplifiée) --}}
        <footer class="container py-5">
            <hr>
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Nama') }}. {{ __('Tous droits réservés.') }}</p>
        </footer>
    </div> {{-- Fin div#app --}}

    {{-- Intégrer vos fichiers JS compilés ici --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> {{-- Exemple CDN Bootstrap --}}
     <script src="{{ asset('js/frontend.js') }}" defer></script> {{-- Assurez-vous que ce fichier existe ou commentez/supprimez cette ligne --}}

    {{-- Scripts spécifiques (si nécessaire plus tard) --}}
    {{-- @stack('scripts') --}}
</body>
</html>