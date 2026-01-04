@extends('layouts.app')

@section('title', 'Plats Traditionnels')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Plats Traditionnels Béninois</h1>
            <p class="text-muted mb-0">Découvrez la richesse gastronomique du Bénin</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-filter me-2"></i>Filtrer
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter un plat
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
                        <button class="btn btn-primary btn-sm">Tous</button>
                        <button class="btn btn-outline-primary btn-sm">Plats principaux</button>
                        <button class="btn btn-outline-primary btn-sm">Accompagnements</button>
                        <button class="btn btn-outline-primary btn-sm">Desserts</button>
                        <button class="btn btn-outline-primary btn-sm">Boissons</button>
                        <button class="btn btn-outline-primary btn-sm">Snacks</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plats Grid -->
    <div class="row">
        @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden;">
                    <div class="position-relative">
                        <div class="h-48 bg-gradient-to-br from-orange-100 to-yellow-50 flex items-center justify-center">
                            <i class="fas fa-utensils text-orange-500 text-6xl"></i>
                        </div>
                        <div class="position-absolute top-3 right-3">
                            <span class="px-3 py-1 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-xs font-bold rounded-full">
                                @if($i % 4 == 1) Plat principal
                                @elseif($i % 4 == 2) Accompagnement
                                @elseif($i % 4 == 3) Dessert
                                @else Boisson
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
                                <span class="ms-1 small text-muted">({{ rand(20, 100) }})</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title text-gray-800 mb-3">
                            @if($i % 6 == 1) Amiwo
                            @elseif($i % 6 == 2) Akassa
                            @elseif($i % 6 == 3) Gari Foto
                            @elseif($i % 6 == 4) Atassi
                            @elseif($i % 6 == 5) Tchatchanga
                            @else Wassa Wassa
                            @endif
                        </h5>
                        
                        <p class="text-gray-600 mb-3">
                            @if($i % 3 == 1)
                                Plat traditionnel à base de maïs, accompagné de sauce épicée aux légumes locaux.
                            @elseif($i % 3 == 2)
                                Spécialité béninoise riche en protéines, servie avec des bananes plantain frites.
                            @else
                                Mets typique du sud Bénin, préparé avec des ingrédients frais et locaux.
                            @endif
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-muted small">
                                <i class="fas fa-clock me-1"></i>
                                @if($i % 3 == 1) 45 min
                                @elseif($i % 3 == 2) 30 min
                                @else 60 min
                                @endif
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-chart-simple me-1"></i>
                                @if($i % 4 == 1) Facile
                                @elseif($i % 4 == 2) Moyen
                                @else Difficile
                                @endif
                            </div>
                        </div>
                        
                        <!-- Comments Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <small class="text-muted me-2">Commentaires:</small>
                                <span class="badge bg-primary">{{ rand(3, 15) }}</span>
                            </div>
                            <div class="border rounded p-2 bg-light">
                                <div class="d-flex align-items-start mb-2">
                                    <img src="https://picsum.photos/seed/user{{ $i }}/30/30.jpg" class="rounded-circle me-2" alt="User">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="fw-medium">Marie K.</small>
                                            <small class="text-muted">
                                                @if($i % 3 == 1) il y a 2h
                                                @elseif($i % 3 == 2) il y a 15 min
                                                @else il y a 1 jour
                                                @endif
                                            </small>
                                        </div>
                                        <small class="text-muted">Excellent plat ! Recette authentique.</small>
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
