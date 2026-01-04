@extends('layouts.app')

@section('title', 'Événements')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Événements Académiques</h1>
            <p class="text-muted mb-0">Découvrez tous les événements publiés par les établissements</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <i class="fas fa-filter me-2"></i>Filtrer
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Publier un événement
                </button>
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
                                <input type="text" class="form-control border-start-0" placeholder="Rechercher un événement...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Tous les types</option>
                                <option>Examens</option>
                                <option>Journées spéciales</option>
                                <option>Inscriptions</option>
                                <option>Réunions parents</option>
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
                                <option selected>Toutes les dates</option>
                                <option>Aujourd'hui</option>
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>Plus récents</option>
                                <option>Plus anciens</option>
                                <option>Populaires</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Filters -->
    <div class="row mb-4" id="activeFilters" style="display: none;">
        <div class="col-12">
            <div class="d-flex align-items-center flex-wrap">
                <span class="text-muted me-3">Filtres actifs:</span>
                <span class="badge bg-primary me-2">
                    Examens <i class="fas fa-times ms-1"></i>
                </span>
                <span class="badge bg-primary me-2">
                    Atlantique <i class="fas fa-times ms-1"></i>
                </span>
                <a href="#" class="text-danger small">
                    <i class="fas fa-times-circle me-1"></i>Tout effacer
                </a>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="row">
        @for($i = 1; $i <= 9; $i++)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden;">
                    <div class="position-relative">
                        @if($i % 3 == 1)
                            <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                                <i class="fas fa-file-alt text-blue-500 text-6xl"></i>
                            </div>
                            <div class="position-absolute top-3 right-3">
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-600 to-blue-800 text-white text-xs font-bold rounded-full">
                                    EXAMEN
                                </span>
                            </div>
                        @elseif($i % 3 == 2)
                            <div class="h-48 bg-gradient-to-br from-orange-100 to-yellow-50 flex items-center justify-center">
                                <i class="fas fa-users text-orange-500 text-6xl"></i>
                            </div>
                            <div class="position-absolute top-3 right-3">
                                <span class="px-3 py-1 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-xs font-bold rounded-full">
                                    JOURNÉE SPÉCIALE
                                </span>
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-green-100 to-emerald-50 flex items-center justify-center">
                                <i class="fas fa-bullhorn text-green-600 text-6xl"></i>
                            </div>
                            <div class="position-absolute top-3 right-3">
                                <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-full">
                                    INFORMATION
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 flex items-center justify-center me-3" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-university text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-gray-800">
                                    @if($i % 4 == 1) Université d'Abomey-Calavi
                                    @elseif($i % 4 == 2) Lycée Béhanzin
                                    @elseif($i % 4 == 3) Collège d'Enseignement Général
                                    @else Université de Parakou
                                    @endif
                                </div>
                                <div class="text-xs text-muted">Publié il y a {{ $i }} jours</div>
                            </div>
                        </div>
                        
                        <h5 class="card-title text-gray-800 mb-3">
                            @if($i % 5 == 1) Calendrier des examens finaux
                            @elseif($i % 5 == 2) Journée Culturelle & Artistique
                            @elseif($i % 5 == 3) Inscriptions rentrée 2026-2027
                            @elseif($i % 5 == 4) Réunion parents-professeurs
                            @else Séminaire pédagogique annuel
                            @endif
                        </h5>
                        
                        <p class="text-gray-600 mb-4">
                            @if($i % 4 == 1)
                                Publication du calendrier officiel des examens de fin d'année 2025-2026 pour toutes les facultés.
                            @elseif($i % 4 == 2)
                                Une journée dédiée à la culture béninoise avec expositions, danses traditionnelles et défilé de mode.
                            @elseif($i % 4 == 3)
                                Ouverture des inscriptions pour la nouvelle année scolaire. Procédures et dates importantes.
                            @else
                                Formation continue pour les enseignants sur les nouvelles méthodes pédagogiques.
                            @endif
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-alt me-1"></i>
                                @if($i % 3 == 1) 10-25 Mars 2026
                                @elseif($i % 3 == 2) 22 Mars 2026
                                @else 1-30 Avril 2026
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-eye me-1"></i>{{ rand(100, 999) }} vues
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="https://picsum.photos/seed/user{{ $i }}/30/30.jpg" class="rounded-circle me-2" alt="User">
                                <div>
                                    <div class="text-sm fw-medium">Dr. K. Adébayo</div>
                                    <div class="text-xs text-muted">Administrateur</div>
                                </div>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-eye"></i>
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

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filtres avancés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Type d'événement</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="exam" checked>
                            <label class="form-check-label" for="exam">Examens</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="special" checked>
                            <label class="form-check-label" for="special">Journées spéciales</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inscription">
                            <label class="form-check-label" for="inscription">Inscriptions</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Région</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="atlantique" checked>
                            <label class="form-check-label" for="atlantique">Atlantique</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="littoral">
                            <label class="form-check-label" for="littoral">Littoral</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="zou">
                            <label class="form-check-label" for="zou">Zou</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Période</label>
                        <select class="form-select">
                            <option>Toutes les périodes</option>
                            <option>Cette semaine</option>
                            <option>Ce mois</option>
                            <option>Ce trimestre</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Établissement</label>
                        <input type="text" class="form-control" placeholder="Rechercher un établissement...">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Appliquer les filtres</button>
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

.pagination .page-link {
    color: #0A2E5C;
    border-color: #dee2e6;
    padding: 0.5rem 1rem;
}

.pagination .page-item.active .page-link {
    background-color: #0A2E5C;
    border-color: #0A2E5C;
}

.pagination .page-link:hover {
    color: #0A2E5C;
    background-color: rgba(10, 46, 92, 0.1);
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
</style>
@endpush
