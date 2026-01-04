@extends('layouts.app')

@section('title', 'Établissements')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Établissements Académiques</h1>
            <p class="text-muted mb-0">Découvrez les écoles, collèges et universités du Bénin</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-map me-2"></i>Voir la carte
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Inscrire mon établissement
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #0A2E5C;">
                <div class="card-body text-center">
                    <i class="fas fa-university fa-2x text-primary mb-2"></i>
                    <h4 class="mb-1" style="color: #0A2E5C;">45</h4>
                    <small class="text-muted">Universités</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #FF7A00;">
                <div class="card-body text-center">
                    <i class="fas fa-school fa-2x text-warning mb-2"></i>
                    <h4 class="mb-1" style="color: #FF7A00;">127</h4>
                    <small class="text-muted">Lycées</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #28a745;">
                <div class="card-body text-center">
                    <i class="fas fa-graduation-cap fa-2x text-success mb-2"></i>
                    <h4 class="mb-1" style="color: #28a745;">234</h4>
                    <small class="text-muted">Collèges</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #dc3545;">
                <div class="card-body text-center">
                    <i class="fas fa-book-reader fa-2x text-danger mb-2"></i>
                    <h4 class="mb-1" style="color: #dc3545;">89</h4>
                    <small class="text-muted">Écoles primaires</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" placeholder="Rechercher un établissement...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Tous les types</option>
                                <option>Universités</option>
                                <option>Lycées</option>
                                <option>Collèges</option>
                                <option>Écoles primaires</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Toutes les régions</option>
                                <option>Atlantique</option>
                                <option>Littoral</option>
                                <option>Zou</option>
                                <option>Borgou</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Public</option>
                                <option>Privé</option>
                                <option>Tous</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Meilleur noté</option>
                                <option>Plus récent</option>
                                <option>Plus ancien</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Institutions Grid -->
    <div class="row">
        @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 flex items-center justify-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-university text-primary fa-xl"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title text-gray-800 mb-1">
                                    @if($i % 6 == 1) Université d'Abomey-Calavi
                                    @elseif($i % 6 == 2) Université de Parakou
                                    @elseif($i % 6 == 3) Lycée Béhanzin
                                    @elseif($i % 6 == 4) Collège d'Enseignement Général
                                    @elseif($i % 6 == 5) École Primaire Saint-Joseph
                                    @else Institut Supérieur de Management
                                    @endif
                                </h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">
                                        @if($i % 4 == 1) Université
                                        @elseif($i % 4 == 2) Lycée
                                        @elseif($i % 4 == 3) Collège
                                        @else École primaire
                                        @endif
                                    </span>
                                    <span class="badge bg-success me-2">Public</span>
                                    <span class="text-muted small">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        @if($i % 5 == 1) Cotonou
                                        @elseif($i % 5 == 2) Parakou
                                        @elseif($i % 5 == 3) Abomey
                                        @elseif($i % 5 == 4) Porto-Novo
                                        @else Ouidah
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex align-items-center text-warning mb-2">
                                    @for($j = 1; $j <= 5; $j++)
                                        @if($j <= (4 - ($i % 3)))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted small ms-2">({{ rand(50, 200) }} avis)</span>
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-3">
                            @if($i % 3 == 1)
                                Plus grande université publique du Bénin, offrant des formations dans tous les domaines du savoir.
                            @elseif($i % 3 == 2)
                                Établissement d'excellence académique avec des programmes innovants et un corps professoral qualifié.
                            @else
                                Institution éducative dédiée à l'épanouissement des élèves dans un environnement stimulant.
                            @endif
                        </p>
                        
                        <div class="row text-center mb-3">
                            <div class="col-4">
                                <div class="fw-bold text-primary">{{ rand(500, 5000) }}</div>
                                <small class="text-muted">Étudiants</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-success">{{ rand(50, 200) }}</div>
                                <small class="text-muted">Enseignants</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-warning">{{ rand(10, 50) }}</div>
                                <small class="text-muted">Programmes</small>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-calendar-alt me-1"></i>
                                Membre depuis {{ $i }} an(s)
                            </div>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fas fa-envelope"></i>
                                </button>
                                <button type="button" class="btn btn-outline-success">
                                    <i class="fas fa-phone"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title mb-0" style="color: #0A2E5C; font-weight: 600;">Carte des établissements</h5>
                </div>
                <div class="card-body">
                    <div class="bg-light rounded" style="height: 400px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Carte interactive des établissements</h5>
                            <p class="text-muted">Explorez les établissements sur la carte du Bénin</p>
                            <button class="btn btn-primary mt-3">
                                <i class="fas fa-expand me-2"></i>Agrandir la carte
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

.input-group-text {
    border-right: 0;
}

.form-control:focus {
    border-color: #0A2E5C;
    box-shadow: 0 0 0 0.2rem rgba(10, 46, 92, 0.25);
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
