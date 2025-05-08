<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nama Organisation') }} - @yield('title', __('Accueil'))</title> <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> {{-- Ou une police plus adaptée --}}

    {{-- Assurez-vous que Bootstrap est bien chargé --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Si vous utilisez Bootstrap localement : --}}
    {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- Votre CSS personnalisé (après Bootstrap pour pouvoir surcharger) --}}
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> {{-- Créez ce fichier CSS --}}

    @stack('styles') {{-- Pour ajouter des CSS spécifiques à certaines pages --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- Mettez ici le logo de Nama si disponible, sinon le nom --}}
                    <img src="{{ asset('images/logo_nama.png') }}" alt="{{ config('app.name', 'Nama Organisation') }} Logo" height="40"> {{-- Exemple --}}
                    {{-- {{ config('app.name', 'Nama Organisation') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">{{ __('Accueil') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="#">{{ __('Qui sommes-nous ?') }}</a> {{-- Mettez la bonne route plus tard --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.projects.*') ? 'active' : '' }}" href="#">{{ __('Nos Projets') }}</a> {{-- Mettez la bonne route plus tard --}}
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.news.*') ? 'active' : '' }}" href="#">{{ __('Actualités') }}</a> {{-- Mettez la bonne route plus tard --}}
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="#">{{ __('Contact') }}</a> {{-- Mettez la bonne route plus tard --}}
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                       {{-- Sélecteur de langue --}}
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ strtoupper(app()->getLocale()) }} <i class="fas fa-globe"></i> {{-- Exemple avec FontAwesome --}}
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end">
                               <li><a class="dropdown-item" href="{{ route('language.switch', 'fr') }}">Français (FR)</a></li>
                               <li><a class="dropdown-item" href="{{ route('language.switch', 'ar') }}">العربية (AR)</a></li>
                               {{-- Assurez-vous que la route 'language.switch' existe --}}
                           </ul>
                       </li>

                        {{-- Bouton Faire un Don (exemple) --}}
                       <li class="nav-item ms-2">
                           <a href="#" class="btn btn-primary">{{ __('Faire un Don') }}</a> {{-- Mettez la bonne route/lien plus tard --}}
                       </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content') {{-- C'est ici que le contenu de chaque page sera injecté --}}
        </main>

        <footer class="bg-dark text-light mt-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5>{{ config('app.name', 'Nama Organisation') }}</h5>
                        <p>{{ __('Organisation humanitaire dédiée à...') }}</p> {{-- Courte description --}}
                    </div>
                    <div class="col-md-2 mb-3">
                        <h5>{{ __('Navigation') }}</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">{{ __('Accueil') }}</a></li>
                            <li><a href="#" class="text-light text-decoration-none">{{ __('Qui sommes-nous ?') }}</a></li>
                            <li><a href="#" class="text-light text-decoration-none">{{ __('Nos Projets') }}</a></li>
                            <li><a href="#" class="text-light text-decoration-none">{{ __('Actualités') }}</a></li>
                            <li><a href="#" class="text-light text-decoration-none">{{ __('Contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h5>{{ __('Contactez-nous') }}</h5>
                        <address>
                           {{-- Mettez ici les vraies infos --}}
                           Yaoundé, Cameroun<br>
                           <abbr title="Phone">Tél:</abbr> +237 123 456 789<br>
                           <abbr title="Email">Email:</abbr> info@nama.org
                        </address>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h5>{{ __('Suivez-nous') }}</h5>
                        {{-- Ajoutez les liens vers les réseaux sociaux --}}
                        <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a> {{-- Exemple FontAwesome --}}
                        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <hr class="text-secondary">
                <div class="text-center">
                    <small>&copy; {{ date('Y') }} {{ config('app.name', 'Nama Organisation') }}. {{ __('Tous droits réservés.') }}</small>
                </div>
            </div>
        </footer>
    </div>

    {{-- Assurez-vous que les JS nécessaires (jQuery, Popper, Bootstrap) sont chargés --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Si vous utilisez Bootstrap localement : --}}
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- Votre JS personnalisé --}}
    <script src="{{ asset('js/frontend.js') }}"></script> {{-- Créez ce fichier JS --}}

    @stack('scripts') {{-- Pour ajouter des JS spécifiques à certaines pages --}}
</body>
</html>