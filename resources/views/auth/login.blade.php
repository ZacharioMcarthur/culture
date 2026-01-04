@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Culture Bénin" class="mx-auto h-16 w-auto mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Connexion</h2>
            <p class="mt-2 text-sm text-gray-600">
                Accédez à votre plateforme culturelle
            </p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-4">
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
                        <input id="password" name="password" type="password" autocomplete="current-password" required
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

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Se souvenir de moi
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Mot de passe oublié?
                        </a>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span class="ml-8">Se connecter</span>
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Pas encore de compte?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Créer un compte
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
            <p class="text-white/80">Connectez-vous pour explorer la richesse culturelle</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulaire de connexion -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}" 
                           required
                           autofocus
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
                           autocomplete="current-password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                           placeholder="Mot de passe">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:text-purple-800">
                            Mot de passe oublié?
                        </a>
                    @endif
                </div>

                <!-- Bouton de connexion -->
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 rounded-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Se connecter
                </button>

                <!-- Lien d'inscription -->
                <div class="text-center">
                    <p class="text-gray-600">
                        Pas encore de compte? 
                        <a href="{{ route('register') }}" class="text-purple-600 font-semibold hover:text-purple-800">
                            Inscrivez-vous
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
