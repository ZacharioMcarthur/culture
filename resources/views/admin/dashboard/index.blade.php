@extends('admin.layout')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\User::count() }}</h3>
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
                    <h3>{{ \App\Models\Contenu::count() }}</h3>
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
                    <h3>{{ \App\Models\Categorie::count() }}</h3>
                    <p>Catégories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Paiement::where('statut', 'réussi')->sum('montant') }}€</h3>
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
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Contenus récents -->
        <div class="col-md-8">
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
                        @forelse(\App\Models\Contenu::latest()->take(5)->get() as $contenu)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ Str::limit($contenu->titre, 50) }}</strong><br>
                                        <small class="text-muted">{{ $contenu->created_at->diffForHumans() }}</small>
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

        <!-- Statistiques -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistiques</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-comments"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Commentaires</span>
                                    <span class="info-box-number">{{ \App\Models\Commentaire::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Notes</span>
                                    <span class="info-box-number">{{ \App\Models\Note::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-images"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Médias</span>
                                    <span class="info-box-number">{{ \App\Models\Media::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-credit-card"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Paiements réussis</span>
                                    <span class="info-box-number">{{ \App\Models\Paiement::where('statut', 'réussi')->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

