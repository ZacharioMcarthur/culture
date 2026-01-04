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

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-gradient mb-2">12</div>
                    <div class="text-gray-600">Départements</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-gradient mb-2">77</div>
                    <div class="text-gray-600">Communes</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-gradient mb-2">30+</div>
                    <div class="text-gray-600">Langues</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-gradient mb-2">100+</div>
                    <div class="text-gray-600">Contenus culturels</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenus Récents -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Contenus Récents</h2>
                <p class="text-xl text-gray-600">Découvrez les dernières publications sur notre culture</p>
            </div>
            
            @if(isset($contenusRecents) && $contenusRecents->count() > 0)
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($contenusRecents as $contenu)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                            @if($contenu->medias->first())
                                <img src="{{ asset('storage/' . $contenu->medias->first()->chemin) }}" 
                                     class="w-full h-48 object-cover" alt="{{ $contenu->titre }}">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-purple-300"></i>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-purple-100 text-purple-600 text-xs px-3 py-1 rounded-full">
                                        {{ $contenu->categorie->nom ?? 'Article' }}
                                    </span>
                                    @if($contenu->statut === 'payant')
                                        <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full">
                                            <i class="fas fa-crown mr-1"></i>Premium
                                        </span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-semibold mb-2">{{ $contenu->titre }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($contenu->contenu), 120) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-eye mr-1"></i>{{ $contenu->vues ?? 0 }} vues
                                    </span>
                                    <a href="{{ route('contenus.details', $contenu->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                        Lire la suite <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('contenus.tous') }}" class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
                        Voir tous les contenus <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-2">Aucun contenu disponible</h3>
                    <p class="text-gray-500">Revenez bientôt pour découvrir de nouveaux contenus culturels.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Pourquoi nous choisir ?</h2>
                <p class="text-xl text-gray-600">Une expérience culturelle unique et immersive</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-book text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Contenus Authentiques</h3>
                    <p class="text-gray-600">Articles rédigés par des experts et passionnés de la culture béninoise.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-photo-video text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Médias Riches</h3>
                    <p class="text-gray-600">Photos, vidéos et documents pour une expérience immersive et complète.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-crown text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Contenus Exclusifs</h3>
                    <p class="text-gray-600">Accédez à des contenus premium à partir de 100 FCFA seulement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 hero-gradient text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Rejoignez notre communauté culturelle</h2>
            <p class="text-xl mb-8 text-white/90">
                Inscrivez-vous dès maintenant pour accéder à tous nos contenus et recevoir les dernières actualités culturelles du Bénin.
            </p>
            @if(!Auth::check())
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        <i class="fas fa-user-plus mr-2"></i>S'inscrire gratuitement
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition">
                        <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
                    </a>
                </div>
            @else
                <a href="{{ route('contenus.tous') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    <i class="fas fa-compass mr-2"></i>Explorer les contenus
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
