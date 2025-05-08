<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Nama Organisation</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .header { text-align: center; margin-bottom: 40px; }
        .section { margin-bottom: 30px; }
        .section h2 { border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .project, .post { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue sur le site de l'Organisation Nama</h1>
        <p>Notre mission : construire un avenir meilleur.</p>
        <nav>
            <a href="{{ route('home.public') }}">Accueil</a> |
            <a href="">À Propos</a> |
            <a href="{{ route('projects.index') }}">Projets</a> |
            <a href="{{ route('blog.index') }}">Blog</a> |
            <a href="{{ route('events.index') }}">Événements</a> |
            <a href="{{ route('partners.index') }}">Partenaires</a> |
            <a href="{{ route('contact.public') }}">Contact</a>
            {{-- Ici, ajouter un sélecteur de langue plus tard --}}
            {{-- Exemple simple de changement de langue (à améliorer) --}}
            <br>
            <a href="?lang=fr">Français</a> | <a href="?lang=ar">العربية</a>
        </nav>
    </div>

    <div class="section">
        <h2>Nos Projets Phares</h2>
        @if(isset($featuredProjects) && $featuredProjects->count() > 0)
            @foreach($featuredProjects as $project)
                <div class="project">
                    <h3>{{ $project->getTranslation('title', app()->getLocale()) }}</h3>
                    <p>{{ $project->getTranslation('description_short', app()->getLocale()) }}</p>
                    <a href="">En savoir plus</a>
                </div>
            @endforeach
        @else
            <p>Aucun projet phare à afficher pour le moment.</p>
        @endif
    </div>

    <div class="section">
        <h2>Actualités Récentes</h2>
        @if(isset($recentPosts) && $recentPosts->count() > 0)
            @foreach($recentPosts as $post)
                <div class="post">
                    <h3></h3>
                    <p></p>
                    <a href="{">Lire la suite</a>
                </div>
            @endforeach
        @else
            <p>Aucune actualité récente à afficher.</p>
        @endif
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Organisation Nama. Tous droits réservés.</p>
    </footer>

</body>
</html>