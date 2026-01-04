<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
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
