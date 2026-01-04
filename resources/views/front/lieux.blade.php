@extends('layouts.app')

@section('title', 'Lieux Touristiques')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Lieux Touristiques du Bénin</h1>
            <p class="text-muted mb-0">Explorez les sites historiques et naturels</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-map me-2"></i>Voir la carte
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter un lieu
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #0A2E5C;">
                <div class="card-body text-center">
                    <i class="fas fa-landmark fa-2x text-primary mb-2"></i>
                    <h4 class="mb-1" style="color: #0A2E5C;">45</h4>
                    <small class="text-muted">Sites historiques</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #28a745;">
                <div class="card-body text-center">
                    <i class="fas fa-tree fa-2x text-success mb-2"></i>
                    <h4 class="mb-1" style="color: #28a745;">32</h4>
                    <small class="text-muted">Parcs naturels</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #FF7A00;">
                <div class="card-body text-center">
                    <i class="fas fa-umbrella-beach fa-2x text-warning mb-2"></i>
                    <h4 class="mb-1" style="color: #FF7A00;">28</h4>
                    <small class="text-muted">Plages</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; border-left: 4px solid #dc3545;">
                <div class="card-body text-center">
                    <i class="fas fa-museum fa-2x text-danger mb-2"></i>
                    <h4 class="mb-1" style="color: #dc3545;">15</h4>
                    <small class="text-muted">Musées</small>
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
                                <input type="text" class="form-control border-start-0" placeholder="Rechercher un lieu...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Tous les types</option>
                                <option>Sites historiques</option>
                                <option>Parcs naturels</option>
                                <option>Plages</option>
                                <option>Musées</option>
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
                                <option selected>Meilleur noté</option>
                                <option>Plus visité</option>
                                <option>Plus récent</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="openNow">
                                <label class="form-check-label" for="openNow">
                                    Ouvert maintenant
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Places Grid -->
    <div class="row">
        @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden;">
                    <div class="position-relative">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-green-50 flex items-center justify-center">
                            @if($i % 4 == 1)
                                <i class="fas fa-landmark text-blue-500 text-6xl"></i>
                            @elseif($i % 4 == 2)
                                <i class="fas fa-tree text-green-600 text-6xl"></i>
                            @elseif($i % 4 == 3)
                                <i class="fas fa-umbrella-beach text-orange-500 text-6xl"></i>
                            @else
                                <i class="fas fa-museum text-red-500 text-6xl"></i>
                            @endif
                        </div>
                        <div class="position-absolute top-3 right-3">
                            <span class="px-3 py-1 bg-gradient-to-r from-blue-600 to-green-600 text-white text-xs font-bold rounded-full">
                                @if($i % 4 == 1) Site historique
                                @elseif($i % 4 == 2) Parc naturel
                                @elseif($i % 4 == 3) Plage
                                @else Musée
                                @endif
                            </span>
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
                                <span class="ms-1 small text-muted">({{ rand(50, 500) }})</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 flex items-center justify-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-gray-800">
                                    @if($i % 6 == 1) Royal Palaces of Abomey
                                    @elseif($i % 6 == 2) Pendjari National Park
                                    @elseif($i % 6 == 3) Fidjrosse Beach
                                    @elseif($i % 6 == 4) Historical Museum of Ouidah
                                    @elseif($i % 6 == 5) Lake Nokoué
                                    @else Ganvié Village
                                    @endif
                                </div>
                                <div class="text-xs text-muted">
                                    @if($i % 5 == 1) Abomey
                                    @elseif($i % 5 == 2) Natitingou
                                    @elseif($i % 5 == 3) Cotonou
                                    @elseif($i % 5 == 4) Ouidah
                                    @else Porto-Novo
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-3">
                            @if($i % 3 == 1)
                                Site classé au patrimoine mondial de l'UNESCO, témoignage de l'histoire du royaume d'Abomey.
                            @elseif($i % 3 == 2)
                                Réserve naturelle abritant éléphants, lions et antilopes dans un paysage spectaculaire.
                            @else
                                Destination touristique populaire avec ses eaux turquoise et ses activités nautiques.
                            @endif
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-muted small">
                                <i class="fas fa-clock me-1"></i>
                                @if($i % 3 == 1) 8h-18h
                                @elseif($i % 3 == 2) 6h-18h
                                @else Ouvert 24/7
                                @endif
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-ticket-alt me-1"></i>
                                @if($i % 4 == 1) 2000 FCFA
                                @elseif($i % 4 == 2) Gratuit
                                @elseif($i % 4 == 3) 500 FCFA
                                @else 1000 FCFA
                                @endif
                            </div>
                        </div>
                        
                        <!-- Comments Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <small class="text-muted me-2">Commentaires:</small>
                                <span class="badge bg-primary">{{ rand(10, 100) }}</span>
                            </div>
                            <div class="border rounded p-2 bg-light">
                                <div class="d-flex align-items-start mb-2">
                                    <img src="https://picsum.photos/seed/visitor{{ $i }}/30/30.jpg" class="rounded-circle me-2" alt="Visitor">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="fw-medium">Jean M.</small>
                                            <small class="text-muted">
                                                @if($i % 3 == 1) il y a 3h
                                                @elseif($i % 3 == 2) il y a 30 min
                                                @else il y a 2 jours
                                                @endif
                                            </small>
                                        </div>
                                        <small class="text-muted">Lieu magnifique à visiter absolument !</small>
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
