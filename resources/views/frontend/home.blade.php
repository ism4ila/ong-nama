<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Organisation Nama - Agir ensemble pour un avenir meilleur">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nama') }} - {{ __('Accueil') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @endif
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <style>
        :root {
            --primary-color: #26A69A;
            /* Vert turquoise */
            --secondary-color: #00796B;
            /* Vert plus foncé */
            --accent-color: #80CBC4;
            /* Vert clair accent */
            --text-color: #263238;
            /* Bleu-gris foncé pour texte */
            --light-gray: #F5F7F8;
            /* Gris très clair pour fonds */
            --dark-gray: #546E7A;
            /* Gris moyen pour texte secondaire */
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Montserrat', 'Cairo', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #FAFAFA;
        }

        /* Navbar styles */
        .navbar {
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.98) !important;
        }

        .navbar-brand img {
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-brand img {
            transform: scale(0.9);
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            transition: all 0.3s ease;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover:after,
        .nav-link.active:after {
            width: 70%;
        }

        /* Hero section */
        .hero-section {
            padding: 5rem 0;
            background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)),
            url('{{ asset("images/hero-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 4rem;
        }

        .hero-title {
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: var(--dark-gray);
        }

        /* Section headers */
        .section-title {
            position: relative;
            display: inline-block;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 2.5rem;
            padding-bottom: 0.8rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
            bottom: 0;
            left: 0;
        }

        [dir="rtl"] .section-title:after {
            right: 0;
            left: auto;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: all 0.8s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .card-text {
            color: var(--dark-gray);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        /* Status badges */
        .status-badge {
            background-color: var(--accent-color);
            color: var(--secondary-color);
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .date-badge {
            background-color: var(--light-gray);
            color: var(--dark-gray);
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
        }

        /* Buttons */
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: 0 4px 10px rgba(38, 166, 154, 0.3);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            box-shadow: 0 6px 15px rgba(38, 166, 154, 0.4);
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: 0 4px 10px rgba(38, 166, 154, 0.3);
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-secondary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            box-shadow: 0 4px 10px rgba(0, 121, 107, 0.3);
            transform: translateY(-2px);
        }

        .btn-outline-info {
            color: var(--dark-gray);
            border-color: var(--dark-gray);
        }

        .btn-outline-info:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
            color: white;
            box-shadow: 0 4px 10px rgba(84, 110, 122, 0.3);
            transform: translateY(-2px);
        }

        .btn-icon-right i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn:hover .btn-icon-right i {
            transform: translateX(4px);
        }

        [dir="rtl"] .btn-icon-right i {
            margin-right: 8px;
            margin-left: 0;
            transform: scaleX(-1);
        }

        [dir="rtl"] .btn:hover .btn-icon-right i {
            transform: scaleX(-1) translateX(-4px);
        }

        /* Event date box */
        .event-date-box {
            background-color: var(--primary-color);
            color: white;
            border-radius: 12px;
            padding: 12px;
            min-width: 80px;
            box-shadow: 0 5px 15px rgba(38, 166, 154, 0.3);
            transition: all 0.3s ease;
            text-align: center;
        }

        .card:hover .event-date-box {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(38, 166, 154, 0.4);
        }

        .event-date-box .day {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }

        .event-date-box .month {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }

        /* Partners section */
        .partner-logo {
            transition: all 0.3s ease;
            filter: grayscale(100%);
            opacity: 0.7;
            max-height: 70px !important;
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        /* Newsletter section */
        .newsletter-section {
            background-color: #E0F2F1;
            border-radius: 20px;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
            box-shadow: inset 0 0 60px rgba(128, 203, 196, 0.2);
            margin-top: 4rem;
            margin-bottom: 4rem;
        }

        .newsletter-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgdmlld0JveD0iMCAwIDQwIDQwIj48ZyBmaWxsPSIjMjZhNjlhIiBmaWxsLW9wYWNpdHk9IjAuMDUiPjxwYXRoIGQ9Ik0wIDBoNDB2NDBIMHoiLz48cGF0aCBkPSJNMCAwaDIwdjIwSDB6TTIwIDIwaDIwdjIwSDIweiIvPjwvZz48L3N2Zz4=');
            opacity: 0.8;
        }

        .newsletter-icon {
            display: inline-block;
            background-color: white;
            padding: 20px;
            border-radius: 50%;
            margin-bottom: 25px;
            box-shadow: 0 10px 20px rgba(38, 166, 154, 0.2);
            position: relative;
            z-index: 1;
        }

        .newsletter-section h2 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .newsletter-section p {
            color: var(--dark-gray);
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }

        .newsletter-form .form-control {
            border-radius: 50px 0 0 50px;
            padding: 14px 25px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
        }

        .newsletter-form .btn {
            border-radius: 0 50px 50px 0;
            padding: 0 30px;
            box-shadow: 0 5px 15px rgba(38, 166, 154, 0.2);
        }

        /* Footer */
        footer {
            background-color: #fff;
            padding-top: 4rem;
            position: relative;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .footer-heading {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 12px;
        }

        .footer-heading:after {
            content: '';
            position: absolute;
            width: 30px;
            height: 2px;
            background-color: var(--primary-color);
            bottom: 0;
            left: 0;
        }

        [dir="rtl"] .footer-heading:after {
            right: 0;
            left: auto;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
        }

        .footer-links a {
            color: var(--dark-gray);
            text-decoration: none;
            margin-bottom: 0.8rem;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 15px;
        }

        .footer-links a:before {
            content: '›';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-size: 1.2rem;
            line-height: 1;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 20px;
        }

        .footer-links a:hover:before {
            left: 5px;
        }

        [dir="rtl"] .footer-links a {
            padding-left: 0;
            padding-right: 15px;
        }

        [dir="rtl"] .footer-links a:before {
            content: '‹';
            left: auto;
            right: 0;
        }

        [dir="rtl"] .footer-links a:hover {
            padding-left: 0;
            padding-right: 20px;
        }

        [dir="rtl"] .footer-links a:hover:before {
            right: 5px;
            left: auto;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            border-radius: 50%;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-links a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(38, 166, 154, 0.3);
        }

        address p {
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            color: var(--dark-gray);
        }

        address p i {
            color: var(--primary-color);
            width: 25px;
        }

        .copyright {
            margin-top: 3rem;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            color: var(--dark-gray);
            text-align: center;
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_nama.png') }}" alt="{{ config('app.name', 'Nama') }} Logo" style="height: 45px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'ms-auto' : 'me-auto' }}">
                        <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ __('Accueil') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="">{{ __('À Propos') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="">{{ __('Projets') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="">{{ __('Actualités') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Contact') }}</a></li>
                    </ul>

                    <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'me-auto' : 'ms-auto' }}">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownLang" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-globe me-1"></i> {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLang">
                                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ url()->current() }}?lang=en">EN (English)</a>
                                <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ url()->current() }}?lang=fr">FR (Français)</a>
                                <a class="dropdown-item {{ app()->getLocale() == 'ar' ? 'active' : '' }}" href="{{ url()->current() }}?lang=ar">AR (العربية)</a>
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

        <main class="py-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center hero-section animate__animated animate__fadeIn">
                        <h1 class="hero-title">{{ __('Bienvenue à l\'Organisation Nama') }}</h1>
                        <p class="hero-subtitle">{{ __('Agir ensemble pour un avenir meilleur.') }}</p>
                        <a href="{{ route('frontend.projects.index') }}" class="btn btn-primary">
                            {{ __('Découvrir nos Projets') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>

                @if($latestProjects->isNotEmpty())
                <div class="row mb-5 fade-in" data-aos="fade-up">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Nos Derniers Projets') }}</h2>
                    </div>

                    @foreach ($latestProjects as $project)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div style="overflow: hidden;">
                                <img src="{{ $project->featured_image ? Storage::url($project->featured_image) : asset('images/placeholder_project.jpg') }}" class="card-img-top" alt="{{ $project->title }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                @if($project->status)
                                <span class="badge status-badge mb-2 align-self-start">{{ __($project->status) }}</span>
                                @endif
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($project->description, 100) }}</p>
                                <a href="" class="btn btn-outline-primary mt-auto">
                                    {{ __('En savoir plus') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 text-center mt-4">
                        <a href="{{ route('frontend.projects.index') }}" class="btn btn-outline-primary">
                            {{ __('Voir tous les projets') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
                @endif

                @if($latestPosts->isNotEmpty())
                <div class="row mb-5 fade-in" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Dernières Actualités') }}</h2>
                    </div>

                    @foreach ($latestPosts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div style="overflow: hidden;">
                                @if($post->featured_image)
                                <img src="{{ Storage::url($post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                                @else
                                <img src="{{ asset('images/placeholder_post.jpg') }}" class="card-img-top" alt="{{ $post->title }}">
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                @if($post->published_at)
                                <span class="badge date-badge mb-2 align-self-start">{{ $post->published_at->translatedFormat('d M Y') }}</span>
                                @endif
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text flex-grow-1">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}
                                </p>
                                <a href="{{ route('frontend.posts.show', $post->slug) }}" class="btn btn-outline-secondary mt-auto">
                                    {{ __('Lire la suite') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 text-center mt-4">
                        <a href="{{ route('frontend.posts.index') }}" class="btn btn-outline-secondary">
                            {{ __('Voir toutes les actualités') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
                @endif

                @if($upcomingEvents->isNotEmpty())
                <div class="row mb-5 fade-in" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Événements à Venir') }}</h2>
                    </div>

                    @foreach ($upcomingEvents as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3 text-center {{ app()->getLocale() == 'ar' ? 'ms-3 me-0' : '' }}">
                                        <div class="event-date-box">
                                            <div class="day">{{ $event->start_datetime->format('d') }}</div>
                                            <div class="month">{{ $event->start_datetime->translatedFormat('M') }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="card-title mb-0">{{ $event->title }}</h5>
                                        @if($event->start_datetime)
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i> {{ $event->start_datetime->format('H:i') }}
                                            @if($event->location)
                                            <i class="fas fa-map-marker-alt ms-2 me-1"></i> {{ $event->location }}
                                            @endif
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <p class="card-text flex-grow-1">{{ Str::limit($event->description, 100) }}</p>
                                <a href="" class="btn btn-outline-info mt-auto">
                                    {{ __('Voir les détails') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 text-center mt-4">
                        <a href="" class="btn btn-outline-info">
                            {{ __('Voir tous les événements') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
                @endif

                @if($partners->isNotEmpty())
                <div class="row fade-in" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12 mb-4">
                        <h2 class="section-title">{{ __('Nos Partenaires') }}</h2>
                    </div>
                    <div class="col-12">
                        <div class="partners-section text-center">
                            <div class="row align-items-center justify-content-center">
                                @foreach ($partners as $partner)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                                    <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer"
                                        title="{{ $partner->name }}" class="d-block">
                                        <img src="{{ $partner->logo_url ? Storage::url($partner->logo_url) : asset('images/placeholder_partner.png') }}"
                                            alt="{{ $partner->name }}"
                                            class="img-fluid partner-logo">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </main>

        <section class="newsletter-section" data-aos="fade-up">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="newsletter-icon">
                            <i class="fas fa-envelope" style="font-size: 2rem; color: var(--primary-color);"></i>
                        </div>
                        <h2>{{ __('Restez informé de nos activités') }}</h2>
                        <p>{{ __('Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et mises à jour.') }}</p>
                        <form class="row g-3 justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group newsletter-form">
                                    <input type="email" class="form-control" placeholder="{{ __('Votre adresse email') }}"
                                        aria-label="{{ __('Votre adresse email') }}" required>
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('S\'inscrire') }} <i class="fas fa-paper-plane ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS animation library
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });
            }

            // Fade-in elements on scroll
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
            fadeInOnScroll(); // Initial check

            // Add smooth scrolling to anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId !== '#') {
                        e.preventDefault();
                        document.querySelector(targetId).scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Handle language dropdown positioning on mobile
            const handleMobileDropdown = function() {
                const dropdown = document.querySelector('#navbarDropdownLang');
                if (dropdown) {
                    const dropdownMenu = dropdown.nextElementSibling;
                    if (window.innerWidth < 992) {
                        dropdownMenu.classList.remove('dropdown-menu-end');
                    } else {
                        dropdownMenu.classList.add('dropdown-menu-end');
                    }
                }
            };
            window.addEventListener('resize', handleMobileDropdown);
            handleMobileDropdown();
        });
    </script>
</body>

</html>