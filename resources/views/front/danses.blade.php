@extends('layouts.app')

@section('title', 'Danses et Rythmes')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Danses et Rythmes Traditionnels</h1>
            <p class="text-muted mb-0">Découvrez la richesse chorégraphique du Bénin</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-play me-2"></i>Vidéos
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter une danse
                </button>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-primary btn-sm">Toutes</button>
                        <button class="btn btn-outline-primary btn-sm">Danses royales</button>
                        <button class="btn btn-outline-primary btn-sm">Danses de guerre</button>
                        <button class="btn btn-outline-primary btn-sm">Danses de célébration</button>
                        <button class="btn btn-outline-primary btn-sm">Danses rituelles</button>
                        <button class="btn btn-outline-primary btn-sm">Danses modernes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Dance -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="h-64 bg-gradient-to-br from-purple-100 to-pink-50 flex items-center justify-center rounded-start">
                                <i class="fas fa-music text-purple-500 text-8xl"></i>
                            </div>
                        </div>
                        <div class="col-md-8 p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-gradient-to-r from-purple-500 to-pink-500 text-white me-2">À la une</span>
                                <div class="d-flex align-items-center text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    <span class="ms-2 text-muted">(250 avis)</span>
                                </div>
                            </div>
                            <h3 class="h2 mb-3" style="color: #0A2E5C;">Danse Zinli</h3>
                            <p class="text-gray-600 mb-4">
                                La danse Zinli est une danse traditionnelle béninoise originaire du peuple Fon. 
                                Elle est souvent exécutée lors des célébrations importantes et des cérémonies royales. 
                                Cette danse se caractérise par ses mouvements gracieux et ses costumes colorés qui 
                                racontent l'histoire et la culture du peuple béninois.
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span class="small">Région: Abomey</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users text-primary me-2"></i>
                                        <span class="small">Origine: Peuple Fon</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <span class="small">Ancienneté: +200 ans</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-play me-2"></i>Voir la vidéo
                                </button>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-info-circle me-2"></i>En savoir plus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dances Grid -->
    <div class="row">
        @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden;">
                    <div class="position-relative">
                        <div class="h-48 bg-gradient-to-br from-purple-100 to-pink-50 flex items-center justify-center">
                            <i class="fas fa-music text-purple-500 text-6xl"></i>
                        </div>
                        <div class="position-absolute top-3 right-3">
                            <span class="px-3 py-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-bold rounded-full">
                                @if($i % 4 == 1) Danse royale
                                @elseif($i % 4 == 2) Danse de guerre
                                @elseif($i % 4 == 3) Danse rituelle
                                @else Danse de célébration
                                @endif
                            </span>
                        </div>
                        <!-- Play Button -->
                        <div class="position-absolute top-1/2 start-1/2 translate-middle">
                            <button class="btn btn-primary rounded-circle" style="width: 50px; height: 50px;">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                        <!-- Rating -->
                        <div class="position-absolute bottom-3 left-3">
                            <div class="d-flex align-items-center bg-white rounded-full px-2 py-1 shadow-sm">
                                @for($j = 1; $j <= 5; $j++)
                                    @if($j <= (4 - ($i % 2)))
                                        <i class="fas fa-star text-warning" style="font-size: 0.8rem;"></i>
                                    @else
                                        <i class="far fa-star text-warning" style="font-size: 0.8rem;"></i>
                                    @endif
                                @endfor
                                <span class="ms-1 small text-muted">({{ rand(30, 200) }})</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title text-gray-800 mb-3">
                            @if($i % 6 == 1) Danse Agbadja
                            @elseif($i % 6 == 2) Danse Tchébé
                            @elseif($i % 6 == 3) Danse Kpétou
                            @elseif($i % 6 == 4) Danse Sakpata
                            @elseif($i % 6 == 5) Danse Gèlèdè
                            @else Danse Adjogan
                            @endif
                        </h5>
                        
                        <p class="text-gray-600 mb-3">
                            @if($i % 3 == 1)
                                Danse traditionnelle exécutée lors des cérémonies de mariage et de baptême.
                            @elseif($i % 3 == 2)
                                Rythme endiablé qui accompagne les festivals et les célébrations populaires.
                            @else
                                Danse sacrée exécutée lors des rituels traditionnels et des cérémonies ancestrales.
                            @endif
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                @if($i % 5 == 1) Abomey
                                @elseif($i % 5 == 2) Porto-Novo
                                @elseif($i % 5 == 3) Cotonou
                                @elseif($i % 5 == 4) Ouidah
                                @else Parakou
                                @endif
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-clock me-1"></i>
                                @if($i % 3 == 1) 5 min
                                @elseif($i % 3 == 2) 8 min
                                @else 12 min
                                @endif
                            </div>
                        </div>
                        
                        <!-- Comments Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <small class="text-muted me-2">Commentaires:</small>
                                <span class="badge bg-primary">{{ rand(5, 25) }}</span>
                            </div>
                            <div class="border rounded p-2 bg-light">
                                <div class="d-flex align-items-start mb-2">
                                    <img src="https://picsum.photos/seed/dancer{{ $i }}/30/30.jpg" class="rounded-circle me-2" alt="User">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="fw-medium">Aminata T.</small>
                                            <small class="text-muted">
                                                @if($i % 3 == 1) il y a 1h
                                                @elseif($i % 3 == 2) il y a 45 min
                                                @else il y a 3 jours
                                                @endif
                                            </small>
                                        </div>
                                        <small class="text-muted">Magnifique chorégraphie ! Culture préservée.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted me-2">Votre note:</small>
                                <div class="btn-group btn-group-sm">
                                    @for($j = 1; $j <= 5; $j++)
                                        <button type="button" class="btn btn-outline-warning">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    @endfor
                                </div>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

.btn-primary {
    background: linear-gradient(135deg, #0A2E5C, #1A5F9E);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1A5F9E, #0A2E5C);
}

.fa-star {
    color: #ffc107;
}

.fa-star:hover {
    color: #ff9800;
}
</style>
@endpush
