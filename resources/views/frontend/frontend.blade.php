<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', __('Accueil'))</title> {{-- Titre dynamique --}}

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Intégrer vos fichiers CSS compilés ici --}}
    {{-- Exemple avec Vite: @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Exemple CDN Bootstrap --}}
     <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> {{-- Ou votre CSS custom si vous en avez créé un --}}

    @stack('styles') {{-- Pour les styles spécifiques à une page --}}
</head>
<body>
    <div id="app">
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
                        {{-- Liens de navigation principaux --}}
                        <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ __('Accueil') }}</a></li>
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
                                {{-- Liens pour changer de langue (logique à ajouter) --}}
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

        <main class="py-4">
            {{-- Le contenu spécifique sera injecté ici --}}
            @yield('content')
        </main>

        <footer class="container py-5">
            <hr>
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Nama') }}. {{ __('Tous droits réservés.') }}</p>
            {{-- Autres liens/infos de pied de page --}}
        </footer>
    </div>

    {{-- Intégrer vos fichiers JS compilés ici --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> {{-- Exemple CDN Bootstrap --}}
     <script src="{{ asset('js/frontend.js') }}" defer></script> {{-- Ou votre JS custom --}}

    @stack('scripts') {{-- Pour les scripts spécifiques à une page --}}
</body>
</html>