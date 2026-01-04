@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-sm-8">
            <h3 class="mb-0" style="color: #0A2E5C; font-weight: 700;">Tableau de Bord</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Vue d'ensemble de la plateforme</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb" style="justify-content: flex-end; margin-bottom: 0;">
                <li class="breadcrumb-item"><a href="#" style="color: #6c757d; text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active" style="color: #3498db; font-weight: 500;">Accueil</li>
            </ol>
        </div>
    </div>

    <!-- Cards Statistiques -->
    <div class="row mb-5">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #3498db;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                                <i class="bi bi-people-fill" style="font-size: 1.5rem; color: #1976d2;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">UTILISATEURS</h5>
                            <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ $totalUsers ?? '0' }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('users.index') }}" class="d-block mt-3 text-decoration-none" 
                       style="color: #3498db; font-weight: 500; font-size: 0.9rem;">
                        Voir détails →
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #2ecc71;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                                <i class="bi bi-translate" style="font-size: 1.5rem; color: #388e3c;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">CONTENUS</h5>
                            <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ $totalContenus ?? '0' }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('contenus.index') }}" class="d-block mt-3 text-decoration-none" 
                       style="color: #2ecc71; font-weight: 500; font-size: 0.9rem;">
                        Voir détails →
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #f1c40f;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 50px; height: 50px; background: linear-gradient(135deg, #fef9e7, #f9e79f);">
                                <i class="bi bi-geo-alt-fill" style="font-size: 1.5rem; color: #d4ac0d;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">RÉGIONS</h5>
                            <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ $totalRegions ?? '0' }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('regions.index') }}" class="d-block mt-3 text-decoration-none"
                       style="color: #f1c40f; font-weight: 500; font-size: 0.9rem;">
                        Voir détails →
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; border-left: 4px solid #e74c3c;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 50px; height: 50px; background: linear-gradient(135deg, #f9ebea, #f5b7b1);">
                                <i class="bi bi-journal-bookmark-fill" style="font-size: 1.5rem; color: #c0392b;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h5 class="mb-1" style="color: #7b8a8b; font-size: 0.9rem; font-weight: 500;">MÉDIAS</h5>
                            <h2 class="mb-0" style="color: #2c3e50; font-weight: 700;">{{ $totalMedias ?? '0' }}</h2>
                        </div>
                    </div>
                    <a href="{{ route('medias.index') }}" class="d-block mt-3 text-decoration-none" 
                       style="color: #e74c3c; font-weight: 500; font-size: 0.9rem;">
                        Voir détails →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex flex-column">
                    <h6 class="mb-3" style="color: #2c3e50; font-weight: 600; font-size: 0.95rem;">
                        <i class="bi bi-people me-2" style="color: #3498db;"></i>
                        Utilisateurs
                    </h6>
                    <div id="usersChart" class="flex-grow-1 d-flex justify-content-center align-items-center" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex flex-column">
                    <h6 class="mb-3" style="color: #2c3e50; font-weight: 600; font-size: 0.95rem;">
                        <i class="bi bi-translate me-2" style="color: #2ecc71;"></i>
                        Contenus
                    </h6>
                    <div id="contenusChart" class="flex-grow-1 d-flex justify-content-center align-items-center" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex flex-column">
                    <h6 class="mb-3" style="color: #2c3e50; font-weight: 600; font-size: 0.95rem;">
                        <i class="bi bi-geo-alt me-2" style="color: #f1c40f;"></i>
                        Régions
                    </h6>
                    <div id="regionsChart" class="flex-grow-1 d-flex justify-content-center align-items-center" style="height: 250px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex flex-column">
                    <h6 class="mb-3" style="color: #2c3e50; font-weight: 600; font-size: 0.95rem;">
                        <i class="bi bi-journal me-2" style="color: #e74c3c;"></i>
                        Médias
                    </h6>
                    <div id="mediasChart" class="flex-grow-1 d-flex justify-content-center align-items-center" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="mb-4" style="color: #2c3e50; font-weight: 600;">
                        <i class="bi bi-clock-history me-2" style="color: #3498db;"></i>
                        Activité Récente
                    </h5>
                    <div class="timeline">
                        @forelse ($recentActivities as $activity)
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" 
                                 style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-person-plus text-primary"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1 fw-semibold">{{ $activity->title }}</h6>
                                        <p class="text-muted small mb-0">{{ $activity->description }}</p>
                                    </div>
                                    <small class="text-muted">{{ $activity->time }}</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-inbox fs-2 mb-2 d-block"></i>
                            <p>Aucune activité récente</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="mb-4" style="color: #2c3e50; font-weight: 600;">
                        <i class="bi bi-star me-2" style="color: #f1c40f;"></i>
                        Contenus Populaires
                    </h5>
                    <div class="list-group list-group-flush">
                        @forelse ($popularContenus as $contenu)
                        <div class="list-group-item px-0 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-semibold">{{ $contenu->titre }}</h6>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="bi bi-eye me-1"></i>
                                        <span>{{ $contenu->views }} vues</span>
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-chat me-1"></i>
                                        <span>{{ $contenu->comments }} commentaires</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-warning text-dark">{{ $contenu->rating }}</span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-muted py-4">
                            <i class="bi bi-star fs-2 mb-2 d-block"></i>
                            <p>Aucun contenu populaire</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
<script>
    // Données des totaux depuis le controller
    const totalUsers = @json($totalUsers ?? 0);
    const totalContenus = @json($totalContenus ?? 0);
    const totalRegions = @json($totalRegions ?? 0);
    const totalMedias = @json($totalMedias ?? 0);

    // Données mensuelles simulées
    const usersData = [12, 19, 15, 25, 22, 30, 28, 35, 32, 38, 42, 45];
    const mois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];

    // 1. Column Chart pour Utilisateurs
    const usersOptions = {
        series: [{
            name: 'Nouveaux utilisateurs',
            data: usersData
        }],
        chart: {
            type: 'bar',
            height: 280,
            toolbar: { show: false },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%'
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val > 0 ? Math.round(val) : '';
            },
            offsetY: -20,
            style: {
                fontSize: '11px',
                fontWeight: 'bold',
                colors: ["#5a5c69"]
            }
        },
        xaxis: {
            categories: mois,
            labels: {
                style: {
                    colors: '#95a5a6',
                    fontSize: '11px',
                    fontWeight: 500
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.round(val);
                },
                style: {
                    colors: '#95a5a6',
                    fontSize: '11px'
                }
            }
        },
        colors: ['#3498db'],
        grid: {
            borderColor: '#e7e7e7',
            strokeDashArray: 4
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#2980b9'],
                opacityFrom: 0.85,
                opacityTo: 0.55
            }
        },
        title: {
            text: `Inscriptions (${totalUsers} total)`,
            align: 'left',
            style: {
                fontSize: '16px',
                fontWeight: '600',
                color: '#2c3e50'
            }
        }
    };

    // 2. Donut Chart pour Contenus
    const contenusOptions = {
        series: [totalContenus, totalMedias],
        chart: {
            type: 'donut',
            height: 280,
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            }
        },
        labels: ['Contenus', 'Médias'],
        colors: ['#2ecc71', '#e74c3c'],
        legend: {
            position: 'bottom',
            fontSize: '12px',
            fontWeight: 500
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return opts.w.config.series[opts.seriesIndex];
            },
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
                colors: ['#fff']
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            fontSize: '13px',
                            fontWeight: 600,
                            color: '#7b8a8b',
                            formatter: function (w) {
                                return totalContenus + totalMedias;
                            }
                        }
                    }
                }
            }
        }
    };

    // 3. Radar Chart pour Régions
    const regionsOptions = {
        series: [{
            name: 'Couverture',
            data: [totalRegions, totalRegions * 0.8, totalRegions * 0.6, totalRegions * 0.9, totalRegions * 0.7]
        }],
        chart: {
            type: 'radar',
            height: 250,
            toolbar: { show: false }
        },
        xaxis: {
            categories: ['Nord', 'Sud', 'Est', 'Ouest', 'Centre']
        },
        yaxis: {
            show: false
        },
        fill: {
            opacity: 0.4
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['#f1c40f']
        },
        markers: {
            size: 4,
            colors: ['#f1c40f'],
            strokeColors: ['#fff'],
            strokeWidth: 2
        },
        colors: ['#f1c40f'],
        title: {
            text: 'Régions Couvertes',
            align: 'center',
            style: {
                fontSize: '16px',
                fontWeight: '600',
                color: '#2c3e50'
            }
        }
    };

    // 4. Line Chart pour Médias
    const mediasOptions = {
        series: [{
            name: 'Médias',
            data: [15, 22, 18, 28, 25, 32, 30, 38, 35, 40, 45, 50]
        }],
        chart: {
            type: 'line',
            height: 250,
            toolbar: { show: false },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            }
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        markers: {
            size: 6,
            colors: ['#fff'],
            strokeColors: ['#e74c3c'],
            strokeWidth: 2
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val > 0 ? Math.round(val) : '';
            },
            offsetY: -10,
            style: {
                fontSize: '11px',
                fontWeight: 'bold',
                colors: ["#5a5c69"]
            }
        },
        xaxis: {
            categories: mois,
            labels: {
                style: {
                    colors: '#95a5a6',
                    fontSize: '12px',
                    fontWeight: 500
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.round(val);
                },
                style: {
                    colors: '#95a5a6',
                    fontSize: '11px'
                }
            }
        },
        colors: ['#e74c3c'],
        grid: {
            borderColor: '#e7e7e7',
            strokeDashArray: 4
        },
        title: {
            text: `Médias (${totalMedias} total)`,
            align: 'left',
            style: {
                fontSize: '16px',
                fontWeight: '600',
                color: '#2c3e50'
            }
        }
    };

    // Initialisation des charts
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            if(document.querySelector("#usersChart")) {
                const usersChart = new ApexCharts(document.querySelector("#usersChart"), usersOptions);
                usersChart.render();
            }
            if(document.querySelector("#contenusChart")) {
                const contenusChart = new ApexCharts(document.querySelector("#contenusChart"), contenusOptions);
                contenusChart.render();
            }
            if(document.querySelector("#regionsChart")) {
                const regionsChart = new ApexCharts(document.querySelector("#regionsChart"), regionsOptions);
                regionsChart.render();
            }
            if(document.querySelector("#mediasChart")) {
                const mediasChart = new ApexCharts(document.querySelector("#mediasChart"), mediasOptions);
                mediasChart.render();
            }
        }, 100);
    });
</script>
@endpush

@push('styles')
<style>
.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.timeline {
    max-height: 300px;
    overflow-y: auto;
}

.list-group-item {
    transition: background-color 0.2s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: #6c757d;
    font-weight: bold;
}
</style>
@endpush
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
