<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Organisation Nama - Agir ensemble pour un avenir meilleur">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Nama'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @endif
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> {{-- Ton CSS principal pour le frontend --}}
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    {{-- Styles spécifiques à la page --}}
    @stack('styles_frontend')

    <style>
        :root {
            --primary-color: #4CAF50; /* Vert principal */
            --secondary-color: #2E7D32; /* Vert plus foncé */
            --accent-color: #8BC34A; /* Vert clair accent */
            --text-color: #374151; /* Gris foncé pour texte */
            --light-gray: #F1F8E9; /* Gris très clair pour fonds */
            --dark-gray: #4B5563; /* Gris moyen pour texte secondaire */
        }
        body {
            font-family: 'Poppins', 'Cairo', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex-grow: 1;
        }
        /* ... (le reste de tes styles globaux de la page home peuvent venir ici ou dans frontend.css) ... */
         /* Navigation */
        .navbar {
            padding: 0.75rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: padding 0.3s ease, box-shadow 0.3s ease; /* Transition pour padding et ombre */
        }
        .navbar-brand img {
             transition: height 0.3s ease;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
        }
        [dir="rtl"] .nav-link:before {
            left: auto;
            right: 0;
        }
        .nav-link:hover:before, .nav-link.active:before {
            width: 100%;
        }
         /* Footer */
        footer {
            background-color: #F3F4F6; /* Un gris un peu plus foncé que --light-gray */
            padding: 3rem 0 1.5rem;
            margin-top: auto; /* Pour pousser le footer en bas si le contenu est court */
        }
        .footer-heading {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }
        .footer-links a {
            display: block;
            color: var(--dark-gray);
            margin-bottom: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }
        [dir="rtl"] .footer-links a:hover {
            padding-right: 5px;
            padding-left: 0;
        }
        .social-links {
            display: flex;
            gap: 1rem;
        }
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .social-links a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #E5E7EB;
            color: var(--dark-gray);
        }

        /* Animation classes (si tu les utilises globalement) */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div id="app">
        {{-- Barre de navigation reprise de ta page home --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_nama.png') }}" alt="{{ config('app.name', 'Nama') }} Logo" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'ms-auto' : 'me-auto' }}">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">{{ __('Accueil') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">{{ __('À Propos') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.projects.index') || request()->routeIs('frontend.projects.show') ? 'active' : '' }}" href="{{ route('frontend.projects.index') }}">{{ __('Projets') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.posts.index') || request()->routeIs('frontend.posts.show') ? 'active' : '' }}" href="{{ route('frontend.posts.index') }}">{{ __('Actualités') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Contact') }}</a></li> {{-- Pense à créer une route pour contact --}}
                    </ul>

                    <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'me-auto' : 'ms-auto' }}">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownLang" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-globe me-1"></i> 
                                @if(app()->getLocale() == 'en') English @endif
                                @if(app()->getLocale() == 'fr') Français @endif
                                @if(app()->getLocale() == 'ar') العربية @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLang">
                                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active disabled' : '' }}" href="{{ url()->current() }}?lang=en">English</a>
                                <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active disabled' : '' }}" href="{{ url()->current() }}?lang=fr">Français</a>
                                <a class="dropdown-item {{ app()->getLocale() == 'ar' ? 'active disabled' : '' }}" href="{{ url()->current() }}?lang=ar">العربية</a>
                            </div>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i> {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i> {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i> {{ __('Admin') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form-frontend').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form-frontend" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        {{-- Footer repris de ta page home --}}
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h4 class="footer-heading">{{ config('app.name', 'Nama') }}</h4>
                        <p>{{ __('Organisation dédiée à agir ensemble pour un avenir meilleur.') }}</p>
                        <div class="social-links mt-4">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 mb-md-0">
                        <h4 class="footer-heading">{{ __('Navigation') }}</h4>
                        <div class="footer-links">
                            <a href="{{ route('frontend.home') }}">{{ __('Accueil') }}</a>
                            <a href="{{ route('frontend.about') }}">{{ __('À Propos') }}</a>
                            <a href="{{ route('frontend.projects.index') }}">{{ __('Projets') }}</a>
                            <a href="{{ route('frontend.posts.index') }}">{{ __('Actualités') }}</a>
                            <a href="#">{{ __('Contact') }}</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 mb-md-0">
                        <h4 class="footer-heading">{{ __('Liens Utiles') }}</h4>
                        <div class="footer-links">
                            <a href="#">{{ __('Faire un don') }}</a>
                            <a href="#">{{ __('Devenir bénévole') }}</a>
                            <a href="#">{{ __('FAQ') }}</a>
                            <a href="#">{{ __('Mentions légales') }}</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">{{ __('Contact') }}</h4>
                        <address>
                            <p><i class="fas fa-map-marker-alt me-2"></i> 123 Rue Principale, Ville</p>
                            <p><i class="fas fa-phone me-2"></i> +123 456 7890</p>
                            <p><i class="fas fa-envelope me-2"></i> contact@nama.org</p>
                        </address>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'Nama') }}. {{ __('Tous droits réservés.') }}</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Ton frontend.js si tu en as un pour des scripts globaux frontend --}}
    {{-- <script src="{{ asset('js/frontend.js') }}" defer></script>  --}}

    {{-- Scripts spécifiques à la page --}}
    @stack('scripts_frontend')

     <script>
        // Script pour l'animation et le sticky navbar repris de ta page home
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150; 
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('active');
                    }
                });
            };
            window.addEventListener('scroll', fadeInOnScroll);
            fadeInOnScroll();

            const navbar = document.querySelector('.navbar.sticky-top');
            if (navbar) {
                const navbarOriginalPaddingTop = window.getComputedStyle(navbar).paddingTop;
                const navbarOriginalPaddingBottom = window.getComputedStyle(navbar).paddingBottom;
                
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.style.paddingTop = '0.5rem';
                        navbar.style.paddingBottom = '0.5rem';
                        navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
                    } else {
                        navbar.style.paddingTop = navbarOriginalPaddingTop;
                        navbar.style.paddingBottom = navbarOriginalPaddingBottom;
                        navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.05)';
                    }
                });
            }
        });
    </script>
</body>
</html>