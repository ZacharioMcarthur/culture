<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture - Découvrez les traditions et l'histoire du Bénin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #FF6B35;
            --secondary-color: #2D5F6F;
            --accent-color: #8B5A3C;
            --light-bg: #F8F9FA;
            --dark-text: #2C3E50;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: var(--dark-text);
        }

        .navbar-brand {
            font-family: 'TikTok Sans', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e55a2b;
            border-color: #e55a2b;
            transform: translateY(-2px);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/images/benin-flag.jpg') center/cover;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .content-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .content-image {
            height: 200px;
            object-fit: cover;
        }

        .category-badge {
            background: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .stats-section {
            background: var(--light-bg);
            padding: 60px 0;
        }

        .stat-card {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .auth-required {
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px 0;
        }

        .premium-content {
            position: relative;
            overflow: hidden;
        }

        .premium-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .premium-content:hover .premium-overlay {
            opacity: 1;
        }

        .footer {
            background: var(--secondary-color);
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-landmark me-2"></i>
                Culture Bénin
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Categorie::all() as $categorie)
                                <li><a class="dropdown-item" href="#">{{ $categorie->nom }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->name ?? Auth::user()->nom ?? 'Utilisateur' }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Inscription
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4">
                        Découvrez la <span class="text-warning">Culture</span> du Bénin
                    </h1>
                    <p class="lead mb-4">
                        Explorez les traditions ancestrales, l'histoire fascinante et les coutumes
                        uniques du Bénin à travers nos contenus exclusifs.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#contenus" class="btn btn-light btn-lg">
                            <i class="fas fa-book-open me-2"></i>Découvrir
                        </a>
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-user-plus me-2"></i>S'inscrire
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/Abomey_2006_1.jpg') }}" alt="Culture Bénin" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistiques -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold">Culture Bénin en Chiffres</h2>
                    <p class="lead text-muted">Découvrez l'étendue de notre collection culturelle</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ \App\Models\Contenu::count() }}</div>
                        <h5>Contenus</h5>
                        <p class="text-muted">Articles, récits et documents</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ \App\Models\Categorie::count() }}</div>
                        <h5>Catégories</h5>
                        <p class="text-muted">Thèmes culturels divers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ \App\Models\Utilisateur::count() }}</div>
                        <h5>Utilisateurs</h5>
                        <p class="text-muted">Membres actifs</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ \App\Models\Commentaire::count() }}</div>
                        <h5>Commentaires</h5>
                        <p class="text-muted">Échanges culturels</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenus Section -->
    <section id="contenus" class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold">Nos Contenus Culturels</h2>
                    <p class="lead text-muted">Explorez l'âme du Bénin à travers nos récits authentiques</p>
                </div>
            </div>

            @guest
                <div class="auth-required mb-5">
                    <h4><i class="fas fa-lock me-2"></i>Contenu Premium Disponible</h4>
                    <p class="mb-3">Connectez-vous pour accéder à l'intégralité de nos contenus culturels exclusifs</p>
                    <a href="{{ route('login') }}" class="btn btn-light me-2">
                        <i class="fas fa-sign-in-alt me-1"></i>Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-warning">
                        <i class="fas fa-user-plus me-1"></i>Créer un compte
                    </a>
                </div>
            @endguest

            <div class="row g-4">
                @forelse(\App\Models\Contenu::with('categorie', 'auteur')->where('statut', 'publié')->take(6)->get() as $contenu)
                    <div class="col-lg-4 col-md-6">
                        <div class="card content-card h-100">
                            @if($contenu->medias->count() > 0)
                                <img src="{{ asset($contenu->medias->first()->chemin) }}" class="card-img-top content-image" alt="{{ $contenu->titre }}">
                            @else
                                <img src="{{ asset('images/c712ca_c2aee551332c4aaf89b856b3d11f1884~mv2.jpg') }}" class="card-img-top content-image" alt="{{ $contenu->titre }}">
                            @endif

                            @if($contenu->statut === 'payant')
                                <div class="premium-overlay">
                                    <div class="text-center text-white">
                                        <i class="fas fa-crown fa-3x mb-3"></i>
                                        <h5>Contenu Premium</h5>
                                        <p>{{ number_format($contenu->prix, 2) }}€</p>
                                        @auth
                                            <form action="{{ route('paiement.initier', $contenu->id_contenu) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-credit-card me-1"></i>Découvrir
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-warning">
                                                <i class="fas fa-sign-in-alt me-1"></i>Se connecter
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="category-badge">{{ $contenu->categorie->nom ?? 'Général' }}</span>
                                    @if($contenu->statut === 'payant')
                                        <span class="badge bg-warning">
                                            <i class="fas fa-crown me-1"></i>{{ number_format($contenu->prix, 2) }}€
                                        </span>
                                    @endif
                                </div>

                                <h5 class="card-title fw-bold">{{ $contenu->titre }}</h5>
                                <p class="card-text text-muted flex-grow-1">
                                    {{ Str::limit(strip_tags($contenu->extrait ?: $contenu->contenu), 120) }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>{{ $contenu->auteur->nom ?? 'Anonyme' }}
                                    </small>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>{{ $contenu->created_at->format('d/m/Y') }}
                                    </small>
                                </div>

                                <div class="mt-3">
                                    @if($contenu->statut === 'payant')
                                        @auth
                                            <form action="{{ route('paiement.initier', $contenu->id_contenu) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning w-100">
                                                    <i class="fas fa-credit-card me-1"></i>Découvrir ({{ number_format($contenu->prix, 2) }}€)
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                                <i class="fas fa-lock me-1"></i>Découvrir (Connexion requise)
                                            </a>
                                        @endauth
                                    @else
                                        <a href="{{ route('contenu.show', $contenu->slug) }}" class="btn btn-primary w-100">
                                            <i class="fas fa-book-open me-1"></i>Lire l'article
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                        <h3 class="text-muted">Aucun contenu disponible</h3>
                        <p class="text-muted">Nous travaillons à enrichir notre collection culturelle.</p>
                    </div>
                @endforelse
            </div>

            @if(\App\Models\Contenu::where('statut', 'publié')->count() > 6)
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>Voir plus de contenus
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="mb-3">
                        <i class="fas fa-landmark me-2"></i>
                        Culture Bénin
                    </h5>
                    <p>Découvrez et préservez les traditions culturelles du Bénin à travers nos contenus exclusifs et authentiques.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-3">Liens rapides</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50">À propos</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Catégories</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-3">Contact</h5>
                    <p class="text-white-50 mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        contact@culturebenin.com
                    </p>
                    <p class="text-white-50 mb-2">
                        <i class="fas fa-phone me-2"></i>
                        +229 XX XX XX XX
                    </p>
                    <p class="text-white-50">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Porto-Novo, Bénin
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Culture Bénin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

