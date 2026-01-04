<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Bénin - Patrimoine et Événements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap');

        body { font-family: 'Poppins', sans-serif; }
        h1,h2,h3,h4,h5 { font-family: 'Montserrat', sans-serif; }

        .hero-gradient { background: linear-gradient(135deg, #0A2E5C 0%, #1A5F9E 100%); }
        .accent-gradient { background: linear-gradient(135deg, #FF7A00 0%, #FF9E40 100%); }
        .text-accent-gradient {
            background: linear-gradient(135deg, #FF7A00 0%, #FF9E40 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .event-badge { position: absolute; top: 15px; right: 15px; z-index: 10; }
        .logo-typo { font-weight: 700; letter-spacing: 1px; color: #0A2E5C; }
        .section-title { position: relative; display: inline-block; margin-bottom: 2rem; }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #FF7A00, #FF9E40);
            border-radius: 2px;
        }
        .feature-icon-wrapper {
            width: 70px; height: 70px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
        }
        .feature-icon-wrapper:hover { transform: scale(1.1); }
        .floating-animation { animation: floating 3s ease-in-out infinite; }
        @keyframes floating { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }
        .pulse-animation { animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(255,122,0,0.5); } 70% { box-shadow: 0 0 0 15px rgba(255,122,0,0); } 100% { box-shadow: 0 0 0 0 rgba(255,122,0,0); } }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <!-- Logo -->
                    <img src="{{ asset('images/logo.png') }}" alt="Culture Bénin" class="w-12 h-12 mr-3">
                    <div>
                        <div class="logo-typo text-xl">CULTURE</div>
                        <div class="text-sm text-gray-600 -mt-1">Patrimoine & Événements</div>
                    </div>
                </div>
                <div class="hidden lg:flex space-x-8">
                    <a href="#" class="text-gray-800 hover:text-blue-700 font-medium transition relative group">
                        Accueil<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#evenements" class="text-gray-800 hover:text-blue-700 font-medium transition relative group">
                        Événements<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#artistes" class="text-gray-800 hover:text-blue-700 font-medium transition relative group">
                        Artistes<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#artisanat" class="text-gray-800 hover:text-blue-700 font-medium transition relative group">
                        Artisanat<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#contact" class="text-gray-800 hover:text-blue-700 font-medium transition relative group">
                        Contact<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-blue-700 hover:text-blue-900 font-medium">
                        <i class="fas fa-sign-in-alt mr-2"></i>Connexion
                    </a>
                    <a href="#" class="bg-gradient-to-r from-blue-700 to-blue-900 text-white px-5 py-2.5 rounded-lg font-medium hover:from-blue-800 hover:to-blue-950 transition shadow-md">
                        <i class="fas fa-user-plus mr-2"></i>Inscription
                    </a>
                    <button class="lg:hidden text-gray-800">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white pt-16 pb-24 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative z-10">
                    <div class="inline-block mb-4 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full">
                        <span class="text-sm font-medium">#CultureBénin</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                        Explorez et célébrez le <span class="text-accent-gradient">patrimoine culturel</span> du Bénin
                    </h1>
                    <p class="text-xl mb-8 text-white/90 leading-relaxed">
                        Une plateforme qui met en avant les événements, artistes, artisanat et traditions béninoises pour tous les passionnés de culture.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#evenements" class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white px-8 py-3.5 rounded-lg font-semibold hover:from-orange-600 hover:to-yellow-600 transition shadow-lg flex items-center">
                            <i class="fas fa-calendar-alt mr-3"></i>Voir les événements
                        </a>
                        <a href="#fonctionnement" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-3.5 rounded-lg font-semibold hover:bg-white/30 transition flex items-center">
                            <i class="fas fa-play-circle mr-3"></i>Comment ça marche ?
                        </a>
                    </div>
                    <div class="mt-12 grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold mb-1">120+</div>
                            <div class="text-sm text-white/80">Artistes</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold mb-1">80+</div>
                            <div class="text-sm text-white/80">Événements</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold mb-1">12</div>
                            <div class="text-sm text-white/80">Régions</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-orange-500/20 to-yellow-500/20 rounded-full blur-3xl"></div>
                    <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 shadow-2xl">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('images/logo.png') }}" alt="Culture Bénin" class="w-24 h-24 rounded-full floating-animation">
                        </div>
                        <div class="bg-white/10 rounded-xl p-6 mb-6">
                            <h3 class="text-xl font-bold mb-3">Événement à venir</h3>
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-calendar-day text-white"></i>
                                </div>
                                <div>
                                    <div class="font-medium">Festival des Masques</div>
                                    <div class="text-sm text-white/80">Ouidah, Bénin</div>
                                </div>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-clock mr-2"></i>
                                <span>20 Janvier 2026 | 10h00 - 22h00</span>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="pulse-animation">
                                <a href="#" class="flex items-center text-white bg-gradient-to-r from-blue-800/50 to-blue-900/50 px-6 py-3 rounded-full border border-white/30">
                                    <i class="fas fa-bell mr-2"></i>
                                    <span>S'inscrire à l'événement</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Événements -->
    <section id="evenements" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-title text-3xl font-bold text-gray-800 inline-block">Événements Récents</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">
                    Découvrez les festivals, expositions et manifestations culturelles à travers le Bénin
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Événement exemple -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-orange-100 to-yellow-50 flex items-center justify-center">
                            <i class="fas fa-mask text-orange-500 text-6xl"></i>
                        </div>
                        <div class="event-badge">
                            <span class="px-3 py-1 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-xs font-bold rounded-full">
                                FESTIVAL
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <i class="fas fa-landmark text-orange-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Ouidah</div>
                                <div class="text-xs text-gray-500">Publié il y a 3 jours</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Festival des Masques</h3>
                        <p class="text-gray-600 mb-4">
                            Une célébration des traditions béninoises avec danses, chants et expositions artisanales.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-1"></i> 20-22 Janvier 2026
                            </div>
                            <a href="#" class="text-blue-700 font-medium hover:text-blue-900 transition">
                                Détails <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Événement 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-green-100 to-emerald-50 flex items-center justify-center">
                            <i class="fas fa-palette text-green-600 text-6xl"></i>
                        </div>
                        <div class="event-badge">
                            <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-full">
                                EXPOSITION
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-paint-brush text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Cotonou</div>
                                <div class="text-xs text-gray-500">Publié il y a 1 semaine</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Exposition Artisanale</h3>
                        <p class="text-gray-600 mb-4">
                            Exposition des artisans locaux : sculpture, tissage, bijoux et céramiques traditionnelles.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-1"></i> 5-10 Février 2026
                            </div>
                            <a href="#" class="text-blue-700 font-medium hover:text-blue-900 transition">
                                Détails <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Événement 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-purple-100 to-violet-50 flex items-center justify-center">
                            <i class="fas fa-music text-purple-600 text-6xl"></i>
                        </div>
                        <div class="event-badge">
                            <span class="px-3 py-1 bg-gradient-to-r from-purple-500 to-violet-600 text-white text-xs font-bold rounded-full">
                                CONCERT
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                <i class="fas fa-music text-purple-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Porto-Novo</div>
                                <div class="text-xs text-gray-500">Publié il y a 5 jours</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Concert Traditionnel</h3>
                        <p class="text-gray-600 mb-4">
                            Un spectacle musical mettant en avant les instruments et rythmes béninois traditionnels.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-1"></i> 15 Février 2026
                            </div>
                            <a href="#" class="text-blue-700 font-medium hover:text-blue-900 transition">
                                Détails <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section id="fonctionnement" class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-title text-3xl font-bold text-gray-800 inline-block">Pourquoi explorer Culture Bénin ?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">
                    Une plateforme pour découvrir, célébrer et partager la richesse culturelle du Bénin
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="feature-icon-wrapper bg-gradient-to-br from-blue-100 to-blue-50">
                        <i class="fas fa-landmark text-blue-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Découverte du patrimoine</h4>
                    <p class="text-gray-600">Explorez monuments, sites historiques et traditions du Bénin.</p>
                </div>
                <div class="text-center p-6">
                    <div class="feature-icon-wrapper bg-gradient-to-br from-orange-100 to-yellow-50">
                        <i class="fas fa-users text-orange-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Événements culturels</h4>
                    <p class="text-gray-600">Soyez informé des festivals, concerts et expositions à travers le pays.</p>
                </div>
                <div class="text-center p-6">
                    <div class="feature-icon-wrapper bg-gradient-to-br from-green-100 to-emerald-50">
                        <i class="fas fa-paint-brush text-green-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Art et artisanat</h4>
                    <p class="text-gray-600">Découvrez les artistes locaux et leur savoir-faire unique.</p>
                </div>
                <div class="text-center p-6">
                    <div class="feature-icon-wrapper bg-gradient-to-br from-purple-100 to-violet-50">
                        <i class="fas fa-mobile-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-3">Accessible partout</h4>
                    <p class="text-gray-600">Consultez la culture béninoise depuis votre smartphone, tablette ou ordinateur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Culture Bénin" class="w-10 h-10 mr-3">
                        <div>
                            <div class="font-bold text-xl">CULTURE</div>
                            <div class="text-sm text-gray-400">Patrimoine & Événements</div>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">
                        Célébrons et partageons la richesse culturelle du Bénin, de ses traditions à son artisanat.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-500 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                        <li><a href="#evenements" class="text-gray-400 hover:text-white transition">Événements</a></li>
                        <li><a href="#artistes" class="text-gray-400 hover:text-white transition">Artistes</a></li>
                        <li><a href="#artisanat" class="text-gray-400 hover:text-white transition">Artisanat</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Culture & Patrimoine</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Festivals</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Expositions</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Artisanat</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Musique & Danse</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Patrimoine Historique</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Contact</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-blue-500 mt-1 mr-3"></i>
                            <span class="text-gray-400">Cotonou, Bénin</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-blue-500 mr-3"></i>
                            <span class="text-gray-400">contact@culturebenin.bj</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-blue-500 mr-3"></i>
                            <span class="text-gray-400">+229 01 23 45 67 89</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Culture Bénin - Plateforme Académique. Tous droits réservés.</p>
                <p class="text-gray-500 text-sm mt-2">Célébrons ensemble la richesse culturelle du Bénin.</p>
            </div>
        </div>
    </footer>
</body>
</html>
