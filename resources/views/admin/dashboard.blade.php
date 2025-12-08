@extends('admin.layout')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['utilisateurs'] }}</h3>

                    <p>Utilisateurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.utilisateurs') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['contenus_valides'] }}</h3>

                    <p>Contenus Validés</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="{{ route('admin.contenus') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['commentaires'] }}</h3>

                    <p>Commentaires</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="{{ route('admin.commentaires') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['contenus_attente'] }}</h3>

                    <p>Contenus en Attente</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="{{ route('admin.contenus') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Statistiques
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Contenus par Type</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="contentChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Utilisateurs par Rôle</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="usersChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <!-- Recent Users -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Utilisateurs Récentes
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($recentUsers as $user)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('adminlte/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="flex-grow-1">
                                    <a href="#">{{ $user->prenom }} {{ $user->nom }}</a>
                                    <p class="text-muted mb-0">{{ $user->role->nom_role ?? 'N/A' }}</p>
                                </div>
                                <span class="badge badge-{{ $user->statut === 'valide' ? 'success' : 'warning' }}">{{ $user->statut }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{ route('admin.utilisateurs') }}">Voir tous les utilisateurs</a>
                </div><!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    <!-- Recent Activities -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-book mr-1"></i>
                        Contenus Récentes
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($recentContents as $content)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <a href="#">{{ Str::limit($content->titre, 50) }}</a>
                                    <p class="text-muted mb-0">
                                        Par {{ $content->auteur->prenom ?? 'N/A' }} {{ $content->auteur->nom ?? '' }} •
                                        {{ $content->typeContenu->nom_contenu ?? 'N/A' }}
                                    </p>
                                </div>
                                <span class="badge badge-{{ $content->statut === 'valide' ? 'success' : ($content->statut === 'en_attente' ? 'warning' : 'danger') }}">{{ $content->statut }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{ route('admin.contenus') }}">Voir tous les contenus</a>
                </div><!-- /.card-footer -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments mr-1"></i>
                        Commentaires Récentes
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($recentComments as $comment)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('adminlte/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="flex-grow-1">
                                    <p class="mb-1">{{ Str::limit($comment->texte, 80) }}</p>
                                    <p class="text-muted mb-0">
                                        Par {{ $comment->utilisateur->prenom ?? 'N/A' }} {{ $comment->utilisateur->nom ?? '' }} •
                                        Sur "{{ Str::limit($comment->contenu->titre ?? 'N/A', 30) }}"
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{ route('admin.commentaires') }}">Voir tous les commentaires</a>
                </div><!-- /.card-footer -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function () {
    // Content Type Chart
    var contentCtx = document.getElementById('contentChart').getContext('2d');
    var contentData = @json($contentByType);
    var contentChart = new Chart(contentCtx, {
        type: 'doughnut',
        data: {
            labels: contentData.map(item => item.nom_contenu),
            datasets: [{
                data: contentData.map(item => item.count),
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545',
                    '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Users by Role Chart
    var usersCtx = document.getElementById('usersChart').getContext('2d');
    var usersData = @json($usersByRole);
    var usersChart = new Chart(usersCtx, {
        type: 'pie',
        data: {
            labels: usersData.map(item => item.nom_role),
            datasets: [{
                data: usersData.map(item => item.count),
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545',
                    '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
@endpush