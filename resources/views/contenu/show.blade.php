<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contenu->titre }} - Culture Bénin</title>
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
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .content-header {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 60px 0;
        }

        .content-meta {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .rating-stars {
            color: #ffc107;
            font-size: 1.2rem;
        }

        .comment-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
        }

        .comment-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-rating {
            border: none;
            background: none;
            color: #ffc107;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .btn-rating:hover {
            transform: scale(1.2);
        }

        .media-gallery img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
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
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->nom }}
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

    <!-- Content Header -->
    <section class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 fw-bold">{{ $contenu->titre }}</h1>
                    <p class="lead">{{ $contenu->extrait }}</p>
                    <div class="d-flex align-items-center gap-4">
                        <span><i class="fas fa-tag me-1"></i>{{ $contenu->categorie->nom ?? 'Général' }}</span>
                        <span><i class="fas fa-user me-1"></i>{{ $contenu->auteur->nom ?? 'Anonyme' }}</span>
                        <span><i class="fas fa-calendar me-1"></i>{{ $contenu->created_at->format('d/m/Y') }}</span>
                        <span><i class="fas fa-eye me-1"></i>{{ $contenu->vues }} vues</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-lg-8">
                    <!-- Media Gallery -->
                    @if($contenu->medias->count() > 0)
                        <div class="media-gallery mb-4">
                            <div class="row g-3">
                                @foreach($contenu->medias as $media)
                                    <div class="col-md-6">
                                        @if(str_contains($media->type, 'image'))
                                            <img src="{{ asset($media->chemin) }}" alt="{{ $media->description ?? $contenu->titre }}" class="img-fluid">
                                        @elseif(str_contains($media->type, 'video'))
                                            <video controls class="w-100">
                                                <source src="{{ asset($media->chemin) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la vidéo.
                                            </video>
                                        @endif
                                        @if($media->description)
                                            <p class="text-muted mt-2">{{ $media->description }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Content Body -->
                    <div class="content-body mb-5">
                        <div class="content-text">
                            {!! nl2br(e($contenu->contenu)) !!}
                        </div>
                    </div>

                    <!-- Rating Section -->
                    @auth
                        <div class="rating-section mb-5">
                            <h4>Noter ce contenu</h4>
                            <form action="{{ route('note.store') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_contenu" value="{{ $contenu->id_contenu }}">
                                <div class="rating-stars mb-3">
                                    @for($i = 5; $i >= 1; $i--)
                                        <button type="submit" name="valeur" value="{{ $i }}" class="btn-rating">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    @endfor
                                </div>
                            </form>
                            @if($moyenneNotes > 0)
                                <p class="text-muted">Note moyenne: {{ number_format($moyenneNotes, 1) }}/5 ({{ $nombreNotes }} avis)</p>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle me-2"></i>
                            <a href="{{ route('login') }}">Connectez-vous</a> pour noter ce contenu.
                        </div>
                    @endauth

                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h4 class="mb-4">
                            Commentaires
                            @if($commentaires->count() > 0)
                                <span class="badge bg-secondary">{{ $commentaires->count() }}</span>
                            @endif
                        </h4>

                        @auth
                            <!-- Comment Form -->
                            <div class="comment-form mb-4">
                                <form action="{{ route('commentaire.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_contenu" value="{{ $contenu->id_contenu }}">
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Votre commentaire</label>
                                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Publier le commentaire</button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i>
                                <a href="{{ route('login') }}">Connectez-vous</a> pour laisser un commentaire.
                            </div>
                        @endauth

                        <!-- Comments List -->
                        <div class="comments-list">
                            @forelse($commentaires as $commentaire)
                                <div class="comment-card">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <strong>{{ $commentaire->utilisateur->nom }} {{ $commentaire->utilisateur->prenom }}</strong>
                                            <small class="comment-date ms-2">
                                                <i class="fas fa-clock me-1"></i>{{ $commentaire->formatted_date }}
                                            </small>
                                        </div>
                                        @if(Auth::check() && Auth::id() === $commentaire->id_utilisateur)
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form action="#" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fas fa-trash me-1"></i>Supprimer
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="mb-0">{{ $commentaire->message }}</p>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Aucun commentaire pour le moment. Soyez le premier à réagir !</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Content Info -->
                    <div class="content-meta">
                        <h5>Informations</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-tag me-2"></i>
                                <strong>Catégorie:</strong> {{ $contenu->categorie->nom ?? 'Général' }}
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-user me-2"></i>
                                <strong>Auteur:</strong> {{ $contenu->auteur->nom ?? 'Anonyme' }}
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-calendar me-2"></i>
                                <strong>Publié le:</strong> {{ $contenu->created_at->format('d/m/Y à H:i') }}
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-eye me-2"></i>
                                <strong>Vues:</strong> {{ $contenu->vues }}
                            </li>
                            @if($moyenneNotes > 0)
                                <li class="mb-2">
                                    <i class="fas fa-star me-2 text-warning"></i>
                                    <strong>Note:</strong> {{ number_format($moyenneNotes, 1) }}/5 ({{ $nombreNotes }} avis)
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Related Content -->
                    @php
                        $contenusSimilaires = \App\Models\Contenu::where('id_categorie', $contenu->id_categorie)
                            ->where('id_contenu', '!=', $contenu->id_contenu)
                            ->where('statut', 'publié')
                            ->take(3)
                            ->get();
                    @endphp

                    @if($contenusSimilaires->count() > 0)
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Contenus similaires</h5>
                            </div>
                            <div class="card-body">
                                @foreach($contenusSimilaires as $similaire)
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            @if($similaire->medias->count() > 0)
                                                <img src="{{ asset($similaire->medias->first()->chemin) }}" alt="{{ $similaire->titre }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                    <i class="fas fa-file-alt text-muted"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">
                                                <a href="{{ route('contenu.show', $similaire->slug) }}" class="text-decoration-none">
                                                    {{ Str::limit($similaire->titre, 40) }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">{{ $similaire->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

