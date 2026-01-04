@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="h3 mb-0" style="color: #0A2E5C; font-weight: 700;">Tableau de Bord</h1>
            <p class="text-muted mb-0">Vue d'ensemble de votre plateforme académique</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-download me-2"></i>Exporter
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nouvel événement
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; border-left: 4px solid #0A2E5C;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px; background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                                <i class="fas fa-school" style="font-size: 1.8rem; color: #0A2E5C;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1 text-muted" style="font-size: 0.85rem; font-weight: 600;">ÉTABLISSEMENTS</h5>
                            <h2 class="mb-0" style="color: #0A2E5C; font-weight: 700;">{{ \App\Models\User::count() }}</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12% ce mois
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; border-left: 4px solid #FF7A00;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px; background: linear-gradient(135deg, #fff3e0, #ffe0b2);">
                                <i class="fas fa-calendar-alt" style="font-size: 1.8rem; color: #FF7A00;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1 text-muted" style="font-size: 0.85rem; font-weight: 600;">ÉVÉNEMENTS</h5>
                            <h2 class="mb-0" style="color: #FF7A00; font-weight: 700;">{{ \App\Models\Contenu::count() }}</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +25% cette semaine
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; border-left: 4px solid #28a745;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px; background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                                <i class="fas fa-users" style="font-size: 1.8rem; color: #28a745;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1 text-muted" style="font-size: 0.85rem; font-weight: 600;">UTILISATEURS</h5>
                            <h2 class="mb-0" style="color: #28a745; font-weight: 700;">1,247</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +8% ce mois
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; border-left: 4px solid #dc3545;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px; background: linear-gradient(135deg, #f8d7da, #f5c6cb);">
                                <i class="fas fa-eye" style="font-size: 1.8rem; color: #dc3545;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1 text-muted" style="font-size: 0.85rem; font-weight: 600;">VUES</h5>
                            <h2 class="mb-0" style="color: #dc3545; font-weight: 700;">8.5K</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +18% cette semaine
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="row">
        <!-- Chart -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0" style="color: #0A2E5C; font-weight: 600;">Évolution des Événements</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-primary active">Semaine</button>
                            <button type="button" class="btn btn-outline-primary">Mois</button>
                            <button type="button" class="btn btn-outline-primary">Année</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="eventsChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title mb-0" style="color: #0A2E5C; font-weight: 600;">Activité Récente</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" 
                                         style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Nouvel événement publié</h6>
                                    <p class="text-muted mb-0" style="font-size: 0.85rem;">UAC - Examen final</p>
                                    <small class="text-muted">Il y a 2 heures</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="timeline-item mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                         style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Nouvel utilisateur inscrit</h6>
                                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Lycée Béhanzin</p>
                                    <small class="text-muted">Il y a 4 heures</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="timeline-item mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" 
                                         style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Événement modifié</h6>
                                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Journée culturelle</p>
                                    <small class="text-muted">Il y a 6 heures</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Events Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0" style="color: #0A2E5C; font-weight: 600;">Événements Récents</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Événement</th>
                                    <th>Établissement</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-file-alt"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Examen final</h6>
                                                <small class="text-muted">Mathématiques</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Université d'Abomey-Calavi</td>
                                    <td><span class="badge bg-primary">Examen</span></td>
                                    <td>15 Mars 2026</td>
                                    <td><span class="badge bg-success">Actif</span></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">Journée Portes Ouvertes</h6>
                                                <small class="text-muted">Présentation des filières</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Lycée Béhanzin</td>
                                    <td><span class="badge bg-warning">Journée spéciale</span></td>
                                    <td>22 Mars 2026</td>
                                    <td><span class="badge bg-success">Actif</span></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.timeline-item {
    position: relative;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 40px;
    bottom: -12px;
    width: 2px;
    background: #e9ecef;
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.btn-group .btn {
    transition: all 0.2s ease;
}

.table-hover tbody tr:hover {
    background-color: rgba(10, 46, 92, 0.05);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('eventsChart').getContext('2d');
    
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(10, 46, 92, 0.8)');
    gradient.addColorStop(1, 'rgba(10, 46, 92, 0.1)');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [{
                label: 'Événements publiés',
                data: [12, 19, 15, 25, 22, 30, 28],
                borderColor: '#0A2E5C',
                backgroundColor: gradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#0A2E5C',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(10, 46, 92, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' événements';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                }
            }
        }
    });
});
</script>
@endpush
