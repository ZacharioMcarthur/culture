<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Bénin - Découvrez notre richesse culturelle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-icon:hover {
            transform: scale(1.1);
        }
        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="Culture Bénin" class="w-12 h-12 mr-3">
                    <span class="text-2xl font-bold text-gradient">Culture Bénin</span>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition">Accueil</a>
                    <a href="{{ route('contenus.tous') }}" class="text-gray-700 hover:text-purple-600 transition">Contenus</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition">À propos</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    @if(!Auth::check())
                        <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800">
                            <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                        </a>
                        <a href="{{ route('register') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                            <i class="fas fa-user-plus mr-2"></i>Inscription
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-purple-600 hover:text-purple-800">
                            <i class="fas fa-user mr-2"></i>Mon compte
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold mb-6">Plongez au cœur de la Culture Béninoise</h1>
                    <p class="text-xl mb-8 text-white/90">
                        Explorez notre riche patrimoine à travers des articles authentiques, des médias exclusifs et des contenus premium qui célèbrent la diversité culturelle du Bénin.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contenus.tous') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                            <i class="fas fa-compass mr-2"></i>Explorer les contenus
                        </a>
                        <a href="#features" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition">
                            <i class="fas fa-play-circle mr-2"></i>Découvrir plus
                        </a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white/20 rounded-full blur-3xl"></div>
                        <img src="{{ asset('images/logo.svg') }}" alt="Culture Bénin" class="relative w-64 h-64 mx-auto animate-pulse">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Cards -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #3498db;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px; background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                                        <i class="fas fa-users" style="font-size: 1.5rem; color: #1976d2;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">UTILISATEURS</h5>
                                    <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ \App\Models\User::count() }}</h2>
                                </div>
                            </div>
                            <div class="mt-3 text-decoration-none" 
                               style="color: #3498db; font-weight: 500; font-size: 0.9rem;">
                                Membres actifs
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #2ecc71;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px; background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                                        <i class="fas fa-language" style="font-size: 1.5rem; color: #388e3c;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">LANGUES</h5>
                                    <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ \App\Models\Langue::count() }}</h2>
                                </div>
                            </div>
                            <div class="mt-3 text-decoration-none" 
                               style="color: #2ecc71; font-weight: 500; font-size: 0.9rem;">
                                Langues béninoises
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #f1c40f;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px; background: linear-gradient(135deg, #fef9e7, #f9e79f);">
                                        <i class="fas fa-map-marked-alt" style="font-size: 1.5rem; color: #d4ac0d;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">RÉGIONS</h5>
                                    <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">12</h2>
                                </div>
                            </div>
                            <div class="mt-3 text-decoration-none"
                               style="color: #f1c40f; font-weight: 500; font-size: 0.9rem;">
                                Couverture nationale
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #e74c3c;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px; background: linear-gradient(135deg, #f9ebea, #f5b7b1);">
                                        <i class="fas fa-book-open" style="font-size: 1.5rem; color: #c0392b;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">CONTENUS</h5>
                                    <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ \App\Models\Contenu::count() }}</h2>
                                </div>
                            </div>
                            <div class="mt-3 text-decoration-none" 
                               style="color: #e74c3c; font-weight: 500; font-size: 0.9rem;">
                                Articles publiés
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenus Récents -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5">Contenus Récents</h2>
                </div>
            </div>
            
            @if(isset($contenusRecents) && $contenusRecents->count() > 0)
                <div class="row">
                    @foreach($contenusRecents as $contenu)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($contenu->medias->first())
                                    <img src="{{ asset('storage/' . $contenu->medias->first()->chemin) }}" 
                                         class="card-img-top" alt="{{ $contenu->titre }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                         style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ Str::limit($contenu->titre, 50) }}</h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($contenu->contenu), 100) }}</p>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-primary">{{ $contenu->categorie->nom ?? 'Article' }}</span>
                                            @if($contenu->statut === 'payant')
                                                <span class="badge bg-warning">
                                                    <i class="fas fa-crown"></i> Premium
                                                </span>
                                            @endif
                                        </div>
                                        <a href="{{ route('contenus.details', $contenu->slug ?? $contenu->id) }}" class="btn btn-outline-primary">
                                            Lire la suite
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ route('contenus.tous') }}" class="btn btn-primary">
                        Voir tous les contenus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h4>Aucun contenu disponible</h4>
                    <p class="text-muted">Revenez bientôt pour découvrir de nouveaux contenus.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5">Pourquoi nous choisir ?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h5>Contenus de Qualité</h5>
                        <p class="text-muted">Articles rédigés par des experts de la culture béninoise.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-photo-video fa-3x text-primary mb-3"></i>
                        <h5>Médias Riches</h5>
                        <p class="text-muted">Photos, vidéos et documents pour une expérience immersive.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-box">
                        <i class="fas fa-crown fa-3x text-primary mb-3"></i>
                        <h5>Contenus Exclusifs</h5>
                        <p class="text-muted">Accédez à des contenus premium à partir de 100 FCFA.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Rejoignez notre communauté</h2>
            <p class="lead mb-4">
                Inscrivez-vous pour accéder à tous nos contenus et recevoir les dernières actualités culturelles.
            </p>
            @if(!Auth::check())
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-user-plus"></i> S'inscrire
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </a>
                </div>
            @else
                <a href="{{ route('contenus.tous') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-compass"></i> Explorer les contenus
                </a>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/logo.svg') }}" alt="Culture Bénin" class="w-10 h-10 mr-3">
                        <span class="text-xl font-bold">Culture Bénin</span>
                    </div>
                    <p class="text-gray-400">Célébrons ensemble la richesse et la diversité de la culture béninoise.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Navigation</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Accueil</a></li>
                        <li><a href="{{ route('contenus.tous') }}" class="hover:text-white transition">Contenus</a></li>
                        <li><a href="#" class="hover:text-white transition">À propos</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Catégories</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Histoires & Contes</a></li>
                        <li><a href="#" class="hover:text-white transition">Recettes</a></li>
                        <li><a href="#" class="hover:text-white transition">Musiques</a></li>
                        <li><a href="#" class="hover:text-white transition">Traditions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Culture Bénin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>
