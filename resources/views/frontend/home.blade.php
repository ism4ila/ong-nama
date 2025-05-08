@extends('layouts.frontend') {{-- Utilise le layout créé --}}

@section('title', __('Accueil')) {{-- Définit le titre spécifique à cette page --}}

@push('styles')
{{-- Ajoutez ici des styles CSS spécifiques à la page d'accueil si nécessaire --}}
<style>
    .hero-section {
        background: url('{{ asset('images/hero-background.jpg') }}') no-repeat center center; /* Image de fond Placeholder */
        background-size: cover;
        color: white;
        padding: 150px 0;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
    }
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: bold;
    }
    .project-card img, .post-card img {
        height: 200px;
        object-fit: cover; /* Assure que l'image couvre bien la zone */
    }
    .section-title {
        margin-bottom: 40px;
        font-weight: bold;
        color: #333;
    }
    .cta-section {
        background-color: #f8f9fa; /* Couleur de fond légère pour distinguer */
        padding: 60px 0;
    }
    .partner-logo {
        max-height: 60px;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    .partner-logo:hover {
        filter: grayscale(0%);
        opacity: 1;
    }
</style>
@endpush

@section('content')

    {{-- 1. Section Héros --}}
    <section class="hero-section text-center">
        <div class="container">
            <h1>{{ __('Nama : Bâtir l\'Espoir Ensemble') }}</h1>
            <p class="lead my-4">{{ __('Agir pour l\'accès à l\'eau potable, l\'éducation et le développement durable des communautés.') }}</p>
            <a href="#" class="btn btn-primary btn-lg">{{ __('Découvrir nos Projets') }}</a>
            <a href="#" class="btn btn-outline-light btn-lg ms-2">{{ __('Faire un Don') }}</a>
        </div>
    </section>

    {{-- 2. Section Introduction Rapide --}}
    <section class="py-5">
        <div class="container">
             <h2 class="text-center section-title">{{ __('Notre Mission') }}</h2>
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="lead">{{ __('Nama est une organisation à but non lucratif engagée dans la réalisation de projets humanitaires durables.') }} {{ __('Nous croyons en la transparence, l\'impact direct et la collaboration pour construire un avenir meilleur pour tous.') }}</p>
                    {{-- Ajouter plus de texte ou des éléments spécifiques ici --}}
                    <a href="#" class="btn btn-outline-secondary">{{ __('En Savoir Plus sur Nama') }}</a>
                </div>
                <div class="col-md-5 text-center">
                    {{-- Image illustrative ou chiffres clés --}}
                    <img src="{{ asset('images/intro-image.png') }}" alt="{{ __('Illustration Mission Nama') }}" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Section Projets Mis en Avant --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">{{ __('Nos Actions Récentes') }}</h2>
            <div class="row g-4">
                @forelse($latestProjects as $project)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm project-card">
                            {{-- Image du projet (exemple avec le premier media item) --}}
                            @if($project->mediaItems->first())
                                <img src="{{ $project->mediaItems->first()->getUrl() }}" class="card-img-top" alt="{{ $project->mediaItems->first()->getCustomProperty('alt_text', $project->getTranslation('title', app()->getLocale())) }}">
                            @else
                                <img src="https://via.placeholder.com/350x200?text=Projet+Nama" class="card-img-top" alt="Image Placeholder"> {{-- Placeholder --}}
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $project->getTranslation('title', app()->getLocale()) }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($project->getTranslation('description', app()->getLocale()), 100) }}</p>
                                <a href="#" class="btn btn-sm btn-outline-primary align-self-start">{{ __('Voir le projet') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p class="text-center">{{ __('Aucun projet à afficher pour le moment.') }}</p>
                    </div>
                @endforelse
            </div>
            @if($latestProjects->count() > 0)
            <div class="text-center mt-4">
                 <a href="#" class="btn btn-secondary">{{ __('Explorer Tous Nos Projets') }}</a>
            </div>
            @endif
        </div>
    </section>

    {{-- 4. Section Actualités Récentes --}}
    <section class="py-5">
        <div class="container">
             <h2 class="text-center section-title">{{ __('Dernières Actualités') }}</h2>
             <div class="row g-4">
                 @forelse($latestPosts as $post)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm post-card">
                             {{-- Image de l'article (si disponible) --}}
                             @if($post->mediaItems->first())
                                <img src="{{ $post->mediaItems->first()->getUrl('thumbnail') ?: $post->mediaItems->first()->getUrl() }}" class="card-img-top" alt="{{ $post->mediaItems->first()->getCustomProperty('alt_text', $post->getTranslation('title', app()->getLocale())) }}">
                             @else
                                <img src="https://via.placeholder.com/350x200?text=Actualité+Nama" class="card-img-top" alt="Image Placeholder"> {{-- Placeholder --}}
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $post->getTranslation('title', app()->getLocale()) }}</h5>
                                <p class="card-text text-muted small mb-2">
                                    {{ __('Publié le') }} {{ $post->created_at->translatedFormat('d F Y') }}
                                    {{-- @if($post->user)par {{ $post->user->name }}@endif --}}
                                    {{-- {{ __('dans') }} <a href="#">{{ $post->category->getTranslation('name', app()->getLocale()) }}</a> --}} {{-- Ajouter lien catégorie plus tard --}}
                                </p>
                                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($post->getTranslation('body', app()->getLocale())), 120) }}</p> {{-- strip_tags pour enlever le HTML de l'extrait --}}
                                <a href="#" class="btn btn-sm btn-outline-secondary align-self-start">{{ __('Lire la suite') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                     <div class="col">
                        <p class="text-center">{{ __('Aucune actualité à afficher pour le moment.') }}</p>
                    </div>
                @endforelse
             </div>
             @if($latestPosts->count() > 0)
             <div class="text-center mt-4">
                  <a href="#" class="btn btn-secondary">{{ __('Toutes les Actualités') }}</a>
             </div>
             @endif
        </div>
    </section>

     {{-- 5. Section Appel à l'Action Secondaire --}}
    <section class="cta-section text-center">
        <div class="container">
            <h2>{{ __('Rejoignez Notre Cause') }}</h2>
            <p class="lead my-4">{{ __('Chaque contribution, petite ou grande, nous aide à poursuivre nos actions sur le terrain.') }}</p>
            <a href="#" class="btn btn-primary btn-lg">{{ __('Faire un Don') }}</a>
            {{-- <a href="#" class="btn btn-outline-secondary btn-lg ms-2">{{ __('Devenir Bénévole') }}</a> --}} {{-- Si applicable --}}
        </div>
    </section>

    {{-- 6. Section Partenaires (Optionnel) --}}
    @if($partners->count() > 0)
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">{{ __('Ils Nous Font Confiance') }}</h2>
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
                 @foreach($partners as $partner)
                    <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer" title="{{ $partner->getTranslation('name', app()->getLocale()) }}">
                        @if($partner->logo_path) {{-- Assurez-vous que 'logo_path' est le bon champ --}}
                        <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->getTranslation('name', app()->getLocale()) }}" class="partner-logo">
                         @else
                        <span class="partner-name">{{ $partner->getTranslation('name', app()->getLocale()) }}</span> {{-- Fallback si pas de logo --}}
                        @endif
                    </a>
                 @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection

@push('scripts')
{{-- Ajoutez ici du JS spécifique à la page d'accueil si nécessaire --}}
<script>
    // Exemple : petite animation ou interaction JS
    console.log("Page d'accueil chargée !");
</script>
@endpush