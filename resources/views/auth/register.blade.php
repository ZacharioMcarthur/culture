@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Culture Bénin" class="mx-auto h-16 w-auto mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Inscription</h2>
            <p class="mt-2 text-sm text-gray-600">
                Rejoignez notre plateforme culturelle
            </p>
        </div>

        <!-- Register Form -->
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Nom complet
                    </label>
                    <div class="mt-1 relative">
                        <input id="name" name="name" type="text" autocomplete="name" required
                               class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               placeholder="Jean Dupont">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Adresse Email
                    </label>
                    <div class="mt-1 relative">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               placeholder="exemple@email.com">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Mot de passe
                    </label>
                    <div class="mt-1 relative">
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                               class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               placeholder="••••••••••">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-600" onclick="togglePassword()">
                                <i class="fas fa-eye" id="passwordToggle"></i>
                            </button>
                        </div>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirmer le mot de passe
                    </label>
                    <div class="mt-1 relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                               class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               placeholder="••••••••••">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les <a href="#" class="text-blue-600 hover:text-blue-500">conditions d'utilisation</a> et la <a href="#" class="text-blue-600 hover:text-blue-500">politique de confidentialité</a>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="ml-8">S'inscrire</span>
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Déjà un compte?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
    }
}
</script>
@endsection
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .input-group {
            position: relative;
        }
        .input-group input {
            padding-left: 45px;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
    </style>
</head>
<body class="flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Logo et titre -->
        <div class="text-center mb-8">
            <div class="inline-block mb-4">
                <img src="{{ asset('images/logo.svg') }}" alt="Culture Bénin" class="w-24 h-24 mx-auto">
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Culture Bénin</h1>
            <p class="text-white/80">Rejoignez notre communauté culturelle</p>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <!-- Nom -->
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}" 
                           required
                           autofocus
                           autocomplete="name"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                           placeholder="Nom complet">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}" 
                           required
                           autocomplete="username"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                           placeholder="Adresse email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           required
                           autocomplete="new-password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                           placeholder="Mot de passe">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           required
                           autocomplete="new-password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                           placeholder="Confirmer le mot de passe">
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 rounded-lg">
                    <i class="fas fa-user-plus mr-2"></i>
                    S'inscrire
                </button>

                <!-- Lien de connexion -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Déjà un compte? 
                        <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:text-purple-800">
                            Connectez-vous
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-white/80 text-sm">
            <p>&copy; 2024 Culture Bénin. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
