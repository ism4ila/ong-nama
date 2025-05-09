<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Organisation Nama - Agir ensemble pour un avenir meilleur">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nama') }} - {{ __('Accueil') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    
    <!-- Animation library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #2E7D32;
            --accent-color: #8BC34A;
            --text-color: #374151;
            --light-gray: #F1F8E9;
            --dark-gray: #4B5563;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        /* Navigation */
        .navbar {
            padding: 0.75rem 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
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
        
        .nav-link:hover:before, .nav-link.active:before {
            width: 100%;
        }
        
        /* Hero section */
        .hero-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, var(--light-gray) 0%, #C8E6C9 100%);
            border-radius: 12px;
        }
        
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: var(--dark-gray);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }
        
        /* Section headers */
        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
            bottom: -10px;
            left: 0;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .card-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .card-text {
            color: var(--dark-gray);
            margin-bottom: 1rem;
        }
        
        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .status-badge {
            background-color: #E8F5E9;
            color: var(--secondary-color);
        }
        
        .date-badge {
            background-color: #DCEDC8;
            color: var(--secondary-color);
        }
        
        .btn-outline-primary, .btn-outline-secondary, .btn-outline-info {
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Partners section */
        .partners-section {
            padding: 2rem;
            background-color: var(--light-gray);
            border-radius: 12px;
            border: 1px dashed rgba(76, 175, 80, 0.3);
        }
        
        .partner-logo {
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .partner-logo:hover {
            filter: grayscale(0);
            opacity: 1;
        }
        
        /* Footer */
        footer {
            background-color: #F3F4F6;
            border-radius: 12px 12px 0 0;
            padding: 3rem 0 1.5rem;
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
        
        /* Animation classes */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
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
                                <i class="fas fa-globe me-1"></i> {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLang">
                                <a class="dropdown-item" href="#">FR</a>
                                <a class="dropdown-item" href="#">AR</a>
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
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i> {{ __('Admin') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i> {{ __('Logout') }}
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

        <!-- Main Content -->
        <main class="py-5">
            <div class="container">
                <!-- Hero Section -->
                <div class="row mb-5">
                    <div class="col-12 text-center hero-section animate__animated animate__fadeIn">
                        <h1 class="hero-title">{{ __('Bienvenue à l\'Organisation Nama') }}</h1>
                        <p class="hero-subtitle">{{ __('Agir ensemble pour un avenir meilleur.') }}</p>
                        <a href="#" class="btn btn-primary">
                            {{ __('Découvrir nos Projets') }} <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Latest Projects Section -->
                <div class="row mb-5 fade-in">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Nos Derniers Projets') }}</h2>
                    </div>
                    
                    @forelse ($latestProjects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset($project->featured_image_url ?? 'images/placeholder.jpg') }}" class="card-img-top" alt="{{ $project->title }}">
                                <div class="card-body">
                                    <span class="badge status-badge mb-2">{{ $project->status }}</span>
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0 pb-3">
                                    <a href="#" class="btn btn-outline-primary">
                                        {{ __('En savoir plus') }} <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> {{ __('Aucun projet à afficher pour le moment.') }}
                            </div>
                        </div>
                    @endforelse
                    
                    @if(count($latestProjects) > 0)
                        <div class="col-12 text-center mt-3">
                            <a href="#" class="btn btn-outline-primary">{{ __('Voir tous les projets') }}</a>
                        </div>
                    @endif
                </div>

                <!-- Latest News Section -->
                <div class="row mb-5 fade-in">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Dernières Actualités') }}</h2>
                    </div>
                    
                    @forelse ($latestPosts as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($post->featured_image_url)
                                    <img src="{{ asset($post->featured_image_url) }}" class="card-img-top" alt="{{ $post->title }}">
                                @endif
                                <div class="card-body">
                                    <span class="badge date-badge mb-2">{{ $post->published_at->format('d/m/Y') }}</span>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0 pb-3">
                                    <a href="#" class="btn btn-outline-secondary">
                                        {{ __('Lire la suite') }} <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> {{ __('Aucune actualité à afficher pour le moment.') }}
                            </div>
                        </div>
                    @endforelse
                    
                    @if(count($latestPosts) > 0)
                        <div class="col-12 text-center mt-3">
                            <a href="#" class="btn btn-outline-secondary">{{ __('Voir toutes les actualités') }}</a>
                        </div>
                    @endif
                </div>

                <!-- Upcoming Events Section -->
                <div class="row mb-5 fade-in">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Événements à Venir') }}</h2>
                    </div>
                    
                    @forelse ($upcomingEvents as $event)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3 text-center">
                                            <div style="background-color: var(--primary-color); color: white; border-radius: 8px; padding: 10px; min-width: 60px; box-shadow: 0 3px 5px rgba(76, 175, 80, 0.2);">
                                                <div style="font-size: 1.5rem; font-weight: 700;">{{ $event->start_datetime->format('d') }}</div>
                                                <div>{{ $event->start_datetime->format('M') }}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">{{ $event->title }}</h5>
                                            <small>
                                                <i class="far fa-clock me-1"></i> {{ $event->start_datetime->format('H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0 pb-3">
                                    <a href="#" class="btn btn-outline-info">
                                        {{ __('Voir les détails') }} <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> {{ __('Aucun événement à venir pour le moment.') }}
                            </div>
                        </div>
                    @endforelse
                    
                    @if(count($upcomingEvents) > 0)
                        <div class="col-12 text-center mt-3">
                            <a href="#" class="btn btn-outline-info">{{ __('Voir tous les événements') }}</a>
                        </div>
                    @endif
                </div>

                <!-- Partners Section -->
                <div class="row fade-in">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Nos Partenaires') }}</h2>
                    </div>
                    <div class="col-12">
                        <div class="partners-section text-center">
                            @if ($partners->isNotEmpty())
                                <div class="row align-items-center justify-content-center">
                                    @foreach ($partners as $partner)
                                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                                            <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer" 
                                               title="{{ $partner->name }}" class="d-block">
                                                <img src="{{ asset($partner->logo_url) }}" alt="{{ $partner->name }}" 
                                                     class="img-fluid partner-logo" style="max-height: 60px; object-fit: contain;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>{{ __('Nos partenaires seront bientôt affichés ici.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Newsletter Section -->
        <section class="py-5 mt-5" style="background-color: #E8F5E9; background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgdmlld0JveD0iMCAwIDQwIDQwIj48ZyBmaWxsPSIjNGNhZjUwIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0wIDBoNDB2NDBIMHoiLz48cGF0aCBkPSJNMCAwaDIwdjIwSDB6TTIwIDIwaDIwdjIwSDIweiIvPjwvZz48L3N2Zz4=');">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div style="display: inline-block; background-color: white; padding: 10px; border-radius: 50%; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <i class="fas fa-envelope" style="font-size: 2rem; color: var(--primary-color);"></i>
                        </div>
                        <h2 class="mb-4" style="color: var(--secondary-color);">{{ __('Restez informé de nos activités') }}</h2>
                        <p class="mb-4">{{ __('Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et mises à jour.') }}</p>
                        <form class="row g-3 justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="{{ __('Votre adresse email') }}" 
                                           aria-label="{{ __('Votre adresse email') }}" required style="border-radius: 50px 0 0 50px; padding: 12px 20px; border: none; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <button class="btn btn-primary" type="submit" style="border-radius: 0 50px 50px 0; padding: 0 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                        {{ __('S\'inscrire') }} <i class="fas fa-paper-plane ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
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
                            <a href="{{ url('/') }}">{{ __('Accueil') }}</a>
                            <a href="#">{{ __('À Propos') }}</a>
                            <a href="#">{{ __('Projets') }}</a>
                            <a href="#">{{ __('Actualités') }}</a>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/frontend.js') }}" defer></script>
    
    <script>
        // Animation on scroll
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
            
            // Initial check
            fadeInOnScroll();
            
            // Check on scroll
            window.addEventListener('scroll', fadeInOnScroll);
            
            // Sticky navbar effect
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.style.padding = '0.5rem 0';
                    navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
                } else {
                    navbar.style.padding = '0.75rem 0';
                    navbar.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.05)';
                }
            });
        });
    </script>
</body>
</html>