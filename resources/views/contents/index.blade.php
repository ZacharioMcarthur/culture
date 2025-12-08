@extends('layouts.culture')

@section('title', ucfirst($type) . ' - Culture Béninoise')

@section('content')
<!-- Hero Section -->
<section class="hero-culture">
    <div class="container">
        <h1>{{ ucfirst($type) }} Traditionnels Béninois</h1>
        <p>Découvrez la richesse culturelle du Bénin à travers ses {{ $nomType }}</p>
    </div>
</section>

<!-- Content Section -->
<section class="section-culture">
    <div class="container">
        @auth
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> Vous êtes connecté. Vous pouvez accéder à tous les contenus.
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fas fa-info-circle"></i> <strong>Connexion requise :</strong> Pour accéder au contenu complet et pouvoir commenter, vous devez être connecté.
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm ml-3">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">S'inscrire</a>
            </div>
        @endauth

        <div class="row">
            @forelse($contenus as $contenu)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carte-culture">
                    @if($contenu->medias->where('id_type_media', 1)->first())
                        <img src="{{ asset($contenu->medias->where('id_type_media', 1)->first()->chemin) }}"
                             alt="{{ $contenu->titre }}" class="img-fluid">
                    @else
                        <div style="height: 200px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="contenu">
                        <h3>{{ $contenu->titre }}</h3>
                        <p>{{ Str::limit($contenu->texte, 100) }}</p>
                        <small class="text-muted">
                            <i class="fas fa-map-marker-alt"></i> {{ $contenu->region->nom_region ?? 'N/A' }} •
                            <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}
                        </small>
                        <div class="mt-3">
                            <a href="{{ route('content.show', $contenu->id) }}" class="btn btn-jaune-benin">
                                <i class="fas fa-eye"></i> Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div style="padding: 60px 20px;">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">Aucun contenu disponible</h3>
                    <p class="text-muted">Nous travaillons à enrichir notre collection de {{ $nomType }}.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $contenus->links() }}
        </div>
    </div>
</section>
@endsection