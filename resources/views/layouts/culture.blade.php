<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez la richesse culturelle du Bénin - Plats traditionnels, danses, lieux touristiques et événements culturels">
    <meta name="keywords" content="Bénin, culture, tradition, plats, danses, tourisme, événements">
    <title>Culture Béninoise - @yield('title', 'Accueil')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/drapeauBenin.jpg') }}" type="image/jpg">

    @stack('styles')
</head>
<body>
    <header>
        <div class="reseaux">
            <div class="mail">
                <a href="mailto:culture.benin@gmail.com" class="link-r">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"/>
                    </svg>
                    culture.benin@gmail.com
                </a>
                <a href="tel:+229 01 23 45 67 89" class="link-r">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"/>
                    </svg>
                    +229 01 23 45 67 89
                </a>
            </div>
            <div class="sociaux">
                <a href="https://facebook.com/culturebenin" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" id="fb">
                        <path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47062 14 5.5 16 5.5H17.5V2.1401C17.1743 2.09685 15.943 2 14.6429 2C11.9284 2 10 3.65686 10 6.69971V9.5H7V13.5H10V22H14V13.5Z"/>
                    </svg>
                </a>
                <a href="https://wa.me/2290123456789" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" id="wht">
                        <path d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 14.1007 14.6691 14.1124 14.7245 14.1377C15.2563 14.3803 16.1258 14.7587 16.1258 14.7587L16.7073 15.0201C16.8047 15.0671 16.8936 15.1778 16.8979 15.2854C16.9005 15.3523 16.9077 15.4603 16.8838 15.6579C16.8525 15.9166 16.7738 16.2281 16.6956 16.3913C16.6406 16.5058 16.5694 16.6074 16.4866 16.6934C16.3743 16.81 16.2909 16.8808 16.1559 16.9814C16.0737 17.0426 16.0311 17.0714 16.0311 17.0714C15.8922 17.159 15.8139 17.2028 15.6484 17.2909C15.391 17.428 15.1066 17.5068 14.8153 17.5218C14.6296 17.5313 14.4444 17.5447 14.2589 17.5347C14.2507 17.5342 13.6907 17.4482 13.6907 17.4482C12.2688 17.0742 10.9538 16.3736 9.85034 15.402C9.62473 15.2034 9.4155 14.9885 9.20194 14.7759C8.31288 13.8908 7.63982 12.9364 7.23169 12.0336C7.03043 11.5884 6.90299 11.1116 6.90098 10.62098C6.89729 10.01405 7.09599 9.4232 7.46569 8.94186C7.53857 8.84697 7.60774 8.74855 7.72709 8.63586C7.85348 8.51651 7.93392 8.45244 8.02057 8.40811C8.13607 8.34902 8.26293 8.31742 8.39232 8.30833Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/drapeauBenin.jpg') }}" alt="Culture Béninoise" style="height: 50px; border-radius: 50%;">
            </div>
            <div class="link">
                <div class="fenetre">
                    <div class="fentitre">
                        <a href="{{ route('home') }}" class="barlink" id="accueil">Accueil</a>
                    </div>
                </div>
                <div class="fenetre">
                    <div class="fentitre">
                        <a href="#plats" class="barlink">Plats</a>
                    </div>
                    <div class="fenmenu">
                        <a href="{{ route('plats.index') }}">Tous les plats</a>
                        <a href="#plats-region">Par région</a>
                    </div>
                </div>
                <div class="fenetre">
                    <div class="fentitre">
                        <a href="#lieux" class="barlink">Lieux</a>
                    </div>
                    <div class="fenmenu">
                        <a href="{{ route('lieux.index') }}">Tous les lieux</a>
                        <a href="#lieux-region">Par région</a>
                    </div>
                </div>
                <div class="fenetre">
                    <div class="fentitre">
                        <a href="#danses" class="barlink">Danses</a>
                    </div>
                    <div class="fenmenu">
                        <a href="{{ route('danses.index') }}">Toutes les danses</a>
                        <a href="#danses-traditionnelles">Traditionnelles</a>
                    </div>
                </div>
                <div class="fenetre">
                    <div class="fentitre">
                        <a href="#evenements" class="barlink">Événements</a>
                    </div>
                    <div class="fenmenu">
                        <a href="{{ route('evenements.index') }}">Tous les événements</a>
                        <a href="#evenements-prochains">Prochains</a>
                    </div>
                </div>
                <div class="espaces">
                    @auth
                        <a href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M7 11C4.51472 11 2.5 8.98528 2.5 6.5C2.5 4.01472 4.51472 2 7 2C9.48528 2 11.5 4.01472 11.5 6.5C11.5 8.98528 9.48528 11 7 11ZM17.5 15C15.2909 15 13.5 13.2091 13.5 11C13.5 8.79086 15.2909 7 17.5 7C19.7091 7 21.5 8.79086 21.5 11C21.5 13.2091 19.7091 15 17.5 15ZM17.5 16C19.9853 16 22 18.0147 22 20.5V21H13V20.5C13 18.0147 15.0147 16 17.5 16ZM7 12C9.76142 12 12 14.2386 12 17V21H2V17C2 14.2386 4.23858 12 7 12Z"/>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M7 11C4.51472 11 2.5 8.98528 2.5 6.5C2.5 4.01472 4.51472 2 7 2C9.48528 2 11.5 4.01472 11.5 6.5C11.5 8.98528 9.48528 11 7 11ZM17.5 15C15.2909 15 13.5 13.2091 13.5 11C13.5 8.79086 15.2909 7 17.5 7C19.7091 7 21.5 8.79086 21.5 11C21.5 13.2091 19.7091 15 17.5 15ZM17.5 16C19.9853 16 22 18.0147 22 20.5V21H13V20.5C13 18.0147 15.0147 16 17.5 16ZM7 12C9.76142 12 12 14.2386 12 17V21H2V17C2 14.2386 4.23858 12 7 12Z"/>
                            </svg>
                            Connexion
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="background: #00432f; color: white; padding: 40px 20px; margin-top: 60px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto;">
            <div>
                <h3 style="color: #ffc002; margin-bottom: 20px;">Culture Béninoise</h3>
                <p>Découvrez la richesse et la diversité de la culture béninoise à travers nos plats traditionnels, nos danses ancestrales, nos lieux touristiques et nos événements culturels.</p>
            </div>
            <div>
                <h4 style="color: #ffc002; margin-bottom: 20px;">Liens rapides</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Accueil</a></li>
                    <li style="margin-bottom: 10px;"><a href="#plats" style="color: white; text-decoration: none;">Plats traditionnels</a></li>
                    <li style="margin-bottom: 10px;"><a href="#lieux" style="color: white; text-decoration: none;">Lieux touristiques</a></li>
                    <li style="margin-bottom: 10px;"><a href="#danses" style="color: white; text-decoration: none;">Danses</a></li>
                    <li style="margin-bottom: 10px;"><a href="#evenements" style="color: white; text-decoration: none;">Événements</a></li>
                </ul>
            </div>
            <div>
                <h4 style="color: #ffc002; margin-bottom: 20px;">Contact</h4>
                <p><i class="fas fa-envelope" style="margin-right: 10px;"></i> culture.benin@gmail.com</p>
                <p><i class="fas fa-phone" style="margin-right: 10px;"></i> +229 01 23 45 67 89</p>
                <div style="margin-top: 20px;">
                    <a href="https://facebook.com/culturebenin" style="color: #ffc002; margin-right: 15px; font-size: 20px;"><i class="fab fa-facebook"></i></a>
                    <a href="https://wa.me/2290123456789" style="color: #ffc002; font-size: 20px;"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2);">
            <p>&copy; 2025 Culture Béninoise. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

