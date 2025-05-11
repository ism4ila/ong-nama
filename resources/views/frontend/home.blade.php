@extends('frontend.frontend')

@section('title')
    {{ $homePageSettings->getTranslation('hero_title', app()->getLocale()) ?? __('Accueil') }} - {{ $siteSettingsGlobal->getTranslation('site_name', app()->getLocale()) ?? config('app.name', 'Nama') }}
@endsection

@push('styles_frontend')
    {{-- Si vous avez créé un home.css spécifique --}}
    {{-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> --}}
    {{-- Sinon, les styles sont dans frontend.css --}}
@endpush

@section('content')
    <div class="container">
        {{-- HERO SECTION --}}
        <div class="row mb-5">
            <div class="col-12 text-center hero-section animate__animated animate__fadeIn"
                 style="{{ $homePageSettings->hero_background_image ? 'background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)), url(' . Storage::url($homePageSettings->hero_background_image) . '); background-size: cover; background-position: center;' : '' }}">
                <h1 class="hero-title">
                    {{ $homePageSettings->getTranslation('hero_title', app()->getLocale()) ?? __('Bienvenue à l\'Organisation Nama') }}
                </h1>
                <p class="hero-subtitle">
                    {{ $homePageSettings->getTranslation('hero_subtitle', app()->getLocale()) ?? __('Agir ensemble pour un avenir meilleur.') }}
                </p>
                @php
                    $heroButtonLink = $homePageSettings->hero_button_link;
                    // Vérifie si le lien est une route nommée ou une URL absolue/relative
                    if ($heroButtonLink && !filter_var($heroButtonLink, FILTER_VALIDATE_URL) && Route::has($heroButtonLink)) {
                        try {
                            $heroButtonLink = route($heroButtonLink, ['locale' => app()->getLocale()]);
                        } catch (\Exception $e) {
                            // Gérer l'exception si la route ne peut être générée (ex: paramètres manquants)
                            // Pour l'instant, on garde le lien tel quel ou on met un fallback
                            $heroButtonLink = url($heroButtonLink);
                        }
                    } elseif ($heroButtonLink) {
                        $heroButtonLink = url($heroButtonLink);
                    } else {
                        $heroButtonLink = route('frontend.projects.index', ['locale' => app()->getLocale()]);
                    }
                @endphp
                <a href="{{ $heroButtonLink }}" class="btn btn-primary">
                    {{ $homePageSettings->getTranslation('hero_button_text', app()->getLocale()) ?? __('Découvrir nos Projets') }}
                    <i class="fas fa-arrow-right btn-icon-right"></i>
                </a>
            </div>
        </div>

        {{-- LATEST PROJECTS --}}
        @if(isset($latestProjects) && $latestProjects->isNotEmpty())
        <div class="row mb-5 fade-in" data-aos="fade-up">
            <div class="col-12 mb-4">
                <h2 class="section-title">{{ $homePageSettings->getTranslation('latest_projects_title', app()->getLocale()) ?? __('Nos Derniers Projets') }}</h2>
            </div>
            @foreach ($latestProjects as $project)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('frontend.projects.show', ['locale' => app()->getLocale(), 'project' => $project->getTranslation('slug', app()->getLocale(), $project->slug)]) }}" class="text-decoration-none">
                        <div style="overflow: hidden; height: 220px;"> {{-- Hauteur fixe pour l'image --}}
                            <img src="{{ $project->image ? Storage::url($project->image) : asset('images/placeholder_project.jpg') }}"
                                 class="card-img-top" alt="{{ $project->getTranslation('title', app()->getLocale()) }}"
                                 style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                    </a>
                    <div class="card-body d-flex flex-column">
                        @if($project->status)
                            <span class="badge status-badge mb-2 align-self-start">{{ __(ucfirst($project->status)) }}</span>
                        @endif
                        <h5 class="card-title">
                            <a href="{{ route('frontend.projects.show', ['locale' => app()->getLocale(), 'project' => $project->getTranslation('slug', app()->getLocale(), $project->slug)]) }}" class="text-decoration-none" style="color: var(--secondary-color);">
                                {{ Str::limit($project->getTranslation('title', app()->getLocale()), 60) }}
                            </a>
                        </h5>
                        <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($project->getTranslation('description', app()->getLocale())), 100) }}</p>
                        <a href="{{ route('frontend.projects.show', ['locale' => app()->getLocale(), 'project' => $project->getTranslation('slug', app()->getLocale(), $project->slug)]) }}" class="btn btn-outline-primary mt-auto align-self-start">
                            {{ __('En savoir plus') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="{{ route('frontend.projects.index', ['locale' => app()->getLocale()]) }}" class="btn btn-primary">
                    {{ __('Voir tous les projets') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                </a>
            </div>
        </div>
        @endif

        {{-- LATEST POSTS --}}
        @if(isset($latestPosts) && $latestPosts->isNotEmpty())
        <div class="row mb-5 fade-in" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 mb-4">
                <h2 class="section-title">{{ $homePageSettings->getTranslation('latest_posts_title', app()->getLocale()) ?? __('Dernières Actualités') }}</h2>
            </div>
            @foreach ($latestPosts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                     <a href="{{ route('frontend.posts.show', ['locale' => app()->getLocale(), 'post' => $post->getTranslation('slug', app()->getLocale(), $post->slug)]) }}" class="text-decoration-none">
                        <div style="overflow: hidden; height: 220px;">
                            @if($post->featured_image)
                            <img src="{{ Storage::url($post->featured_image) }}" class="card-img-top" alt="{{ $post->getTranslation('title', app()->getLocale()) }}" style="object-fit: cover; height: 100%; width: 100%;">
                            @else
                            <img src="{{ asset('images/placeholder_post.jpg') }}" class="card-img-top" alt="{{ $post->getTranslation('title', app()->getLocale()) }}" style="object-fit: cover; height: 100%; width: 100%;">
                            @endif
                        </div>
                    </a>
                    <div class="card-body d-flex flex-column">
                        @if($post->published_at)
                            <span class="badge date-badge mb-2 align-self-start">{{ $post->published_at->translatedFormat('d M Y') }}</span>
                        @endif
                         <h5 class="card-title">
                            <a href="{{ route('frontend.posts.show', ['locale' => app()->getLocale(), 'post' => $post->getTranslation('slug', app()->getLocale(), $post->slug)]) }}" class="text-decoration-none" style="color: var(--secondary-color);">
                                {{ Str::limit($post->getTranslation('title', app()->getLocale()), 60) }}
                            </a>
                        </h5>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit(strip_tags($post->getTranslation('excerpt', app()->getLocale(), $post->getTranslation('body', app()->getLocale()))), 120) }}
                        </p>
                        <a href="{{ route('frontend.posts.show', ['locale' => app()->getLocale(), 'post' => $post->getTranslation('slug', app()->getLocale(), $post->slug)]) }}" class="btn btn-outline-secondary mt-auto align-self-start">
                            {{ __('Lire la suite') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="{{ route('frontend.posts.index', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('Voir toutes les actualités') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                </a>
            </div>
        </div>
        @endif

        {{-- UPCOMING EVENTS --}}
        @if(isset($upcomingEvents) && $upcomingEvents->isNotEmpty())
        <div class="row mb-5 fade-in" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 mb-4">
                <h2 class="section-title">{{ $homePageSettings->getTranslation('upcoming_events_title', app()->getLocale()) ?? __('Événements à Venir') }}</h2>
            </div>
            @foreach ($upcomingEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('frontend.events.show', ['locale' => app()->getLocale(), 'event' => $event->getTranslation('slug', app()->getLocale(), $event->slug)]) }}" class="text-decoration-none">
                         @if($event->image)
                         <div style="overflow: hidden; height: 220px;">
                            <img src="{{ Storage::url($event->image) }}" class="card-img-top" alt="{{ $event->getTranslation('title', app()->getLocale()) }}" style="object-fit: cover; height: 100%; width: 100%;">
                         </div>
                        @else
                         <div style="overflow: hidden; height: 220px; background-color: #e9ecef;" class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar-alt fa-3x text-muted"></i>
                         </div>
                        @endif
                    </a>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 {{ app()->getLocale() == 'ar' ? 'ms-3 me-0' : '' }}">
                                <div class="event-date-box text-center">
                                    <div class="day">{{ $event->start_datetime->format('d') }}</div>
                                    <div class="month">{{ $event->start_datetime->translatedFormat('M') }}</div>
                                </div>
                            </div>
                            <div style="flex-grow: 1;">
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('frontend.events.show', ['locale' => app()->getLocale(), 'event' => $event->getTranslation('slug', app()->getLocale(), $event->slug)]) }}" class="text-decoration-none" style="color: var(--secondary-color);">
                                        {{ Str::limit($event->getTranslation('title', app()->getLocale()), 50) }}
                                    </a>
                                </h5>
                                @if($event->start_datetime)
                                <small class="text-muted d-block">
                                    <i class="far fa-clock me-1"></i> {{ $event->start_datetime->translatedFormat('H:i') }}
                                    @if($event->getTranslation('location', app()->getLocale()))
                                    <br><i class="fas fa-map-marker-alt me-1"></i> {{ Str::limit($event->getTranslation('location', app()->getLocale()), 30) }}
                                    @endif
                                </small>
                                @endif
                            </div>
                        </div>
                        <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($event->getTranslation('description', app()->getLocale())), 100) }}</p>
                        <a href="{{ route('frontend.events.show', ['locale' => app()->getLocale(), 'event' => $event->getTranslation('slug', app()->getLocale(), $event->slug)]) }}" class="btn btn-outline-info mt-auto align-self-start">
                            {{ __('Voir les détails') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="{{ route('frontend.events.index', ['locale' => app()->getLocale()]) }}" class="btn btn-info text-white">
                    {{ __('Voir tous les événements') }} <i class="fas fa-arrow-right btn-icon-right"></i>
                </a>
            </div>
        </div>
        @endif

        {{-- PARTNERS --}}
        @if(isset($partners) && $partners->isNotEmpty())
        <div class="row mb-5 fade-in" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12 mb-4">
                <h2 class="section-title">{{ $homePageSettings->getTranslation('partners_title', app()->getLocale()) ?? __('Nos Partenaires') }}</h2>
            </div>
            <div class="col-12">
                <div class="partners-section text-center">
                    <div class="row align-items-center justify-content-center g-4">
                        @foreach ($partners as $partner)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer"
                                title="{{ $partner->getTranslation('name', app()->getLocale()) }}" class="d-block p-3 partner-logo-container">
                                <img src="{{ $partner->logo_url ? Storage::url($partner->logo_url) : asset('images/placeholder_partner.png') }}"
                                     alt="{{ $partner->getTranslation('name', app()->getLocale()) }}"
                                     class="img-fluid partner-logo" style="max-height: 70px; filter: grayscale(100%); opacity: 0.7; transition: all 0.3s ease;">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> {{-- Fin du container principal --}}

    {{-- NEWSLETTER SECTION (hors container principal pour pleine largeur) --}}
    <section class="newsletter-section mt-5" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <div class="newsletter-icon">
                        <i class="fas fa-envelope" style="font-size: 2rem; color: var(--primary-color);"></i>
                    </div>
                    <h2>{{ $homePageSettings->getTranslation('newsletter_title', app()->getLocale()) ?? __('Restez informé de nos activités') }}</h2>
                    <p class="mb-4">{{ $homePageSettings->getTranslation('newsletter_text', app()->getLocale()) ?? __('Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et mises à jour.') }}</p>
                    <form class="row g-2 justify-content-center" action="#" method="POST"> {{-- Pensez à ajouter une route et un contrôleur pour gérer l'inscription --}}
                        @csrf
                        <div class="col-md-7 col-lg-6">
                            <label for="newsletter_email" class="visually-hidden">{{ __('Votre adresse email') }}</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="newsletter_email" placeholder="{{ __('Votre adresse email') }}" required>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-primary btn-lg" type="submit">
                                {{ __('S\'inscrire') }} <i class="fas fa-paper-plane ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_frontend')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Effet de survol pour les logos des partenaires
    const partnerLogos = document.querySelectorAll('.partner-logo');
    partnerLogos.forEach(logo => {
        logo.addEventListener('mouseover', () => {
            logo.style.filter = 'grayscale(0%)';
            logo.style.opacity = '1';
            logo.style.transform = 'scale(1.05)';
        });
        logo.addEventListener('mouseout', () => {
            logo.style.filter = 'grayscale(100%)';
            logo.style.opacity = '0.7';
            logo.style.transform = 'scale(1)';
        });
    });
});
</script>
@endpush