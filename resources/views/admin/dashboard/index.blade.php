@extends('admin.layout')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">
@endpush

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ number_format($totalUsers) }}</h3>
                    <p>Utilisateurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.utilisateurs.index') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalContenus) }}</h3>
                    <p>Contenus</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('admin.contenus.index') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ number_format($revenusTotaux, 2) }}€</h3>
                    <p>Revenus totaux</p>
                </div>
                <div class="icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <a href="{{ route('admin.paiements.index') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($paiementsReussis) }}</h3>
                    <p>Paiements réussis</p>
                </div>
                <div class="icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <a href="{{ route('admin.paiements.index') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Graphiques -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Paiements des 7 derniers jours
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="paiementsChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Contenus par statut
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="contenusChart" height="200"></canvas>
                    <div class="mt-3">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-circle text-success"></i> Publiés: {{ $contenusPubliés }}</li>
                            <li><i class="fas fa-circle text-warning"></i> Payants: {{ $contenusPayants }}</li>
                            <li><i class="fas fa-circle text-secondary"></i> Brouillons: {{ $contenusBrouillons }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Utilisateurs par mois -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Inscriptions des 12 derniers mois
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="usersChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Statistiques détaillées -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-1"></i>
                        Statistiques détaillées
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info"><i class="fas fa-comments"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Commentaires</span>
                                    <span class="info-box-number">{{ number_format($totalCommentaires) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success"><i class="fas fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Notes</span>
                                    <span class="info-box-number">{{ number_format($totalNotes) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning"><i class="fas fa-images"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Médias</span>
                                    <span class="info-box-number">{{ number_format($totalMedias) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger"><i class="fas fa-hourglass-half"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Paiements en attente</span>
                                    <span class="info-box-number">{{ number_format($paiementsEnAttente) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenus et paiements récents -->
    <div class="row">
        <!-- Contenus récents -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contenus récents</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($contenusRecents as $contenu)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <strong>{{ Str::limit($contenu->titre, 50) }}</strong><br>
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>{{ $contenu->auteur->nom ?? 'Anonyme' }}
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-calendar me-1"></i>{{ $contenu->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <div>
                                        <span class="badge badge-{{ $contenu->statut === 'publié' ? 'success' : ($contenu->statut === 'payant' ? 'warning' : 'secondary') }}">
                                            {{ $contenu->statut }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">
                                Aucun contenu trouvé
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.contenus.index') }}" class="btn btn-sm btn-primary">Voir tous les contenus</a>
                </div>
            </div>
        </div>

        <!-- Paiements récents -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Paiements récents</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($paiementsRecents as $paiement)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <strong>{{ number_format($paiement->montant, 2) }}€</strong><br>
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>{{ $paiement->utilisateur->nom ?? 'N/A' }}
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-book me-1"></i>{{ Str::limit($paiement->contenu->titre ?? 'N/A', 30) }}
                                        </small>
                                    </div>
                                    <div>
                                        <span class="badge badge-{{ $paiement->statut === 'réussi' ? 'success' : ($paiement->statut === 'initié' ? 'warning' : 'danger') }}">
                                            {{ $paiement->statut }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">
                                Aucun paiement trouvé
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.paiements.index') }}" class="btn btn-sm btn-primary">Voir tous les paiements</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Graphique des paiements
        const paiementsCtx = document.getElementById('paiementsChart').getContext('2d');
        new Chart(paiementsCtx, {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Nombre de paiements',
                    data: @json($totauxPaiements),
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }, {
                    label: 'Revenus (€)',
                    data: @json($revenus),
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.1,
                    yAxisID: 'y1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des contenus par statut
        const contenusCtx = document.getElementById('contenusChart').getContext('2d');
        new Chart(contenusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Publiés', 'Payants', 'Brouillons'],
                datasets: [{
                    data: [{{ $contenusPubliés }}, {{ $contenusPayants }}, {{ $contenusBrouillons }}],
                    backgroundColor: [
                        'rgba(40, 167, 69, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(108, 117, 125, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Graphique des utilisateurs
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        new Chart(usersCtx, {
            type: 'bar',
            data: {
                labels: @json($mois),
                datasets: [{
                    label: 'Nouveaux utilisateurs',
                    data: @json($usersData),
                    backgroundColor: 'rgba(54, 162, 235, 0.8)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush

