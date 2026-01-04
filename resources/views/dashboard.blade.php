@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Tableau de bord</h1>
            
            <!-- Welcome Message -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Bienvenue, {{ auth()->user()->name }} !</h5>
                    <p class="card-text">
                        Voici votre espace personnel sur Culture Bénin. Explorez notre riche patrimoine culturel.
                    </p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Contenus publiés</h5>
                            <h2 class="display-4">{{ \App\Models\Contenu::where('statut', 'publié')->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Mes paiements</h5>
                            <h2 class="display-4">{{ \App\Models\Payment::where('user_id', auth()->id())->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">Commentaires</h5>
                            <h2 class="display-4">{{ \App\Models\Commentaire::where('id_utilisateur', auth()->id())->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Statut</h5>
                            <h2 class="display-4">{{ auth()->user()->role ?? 'Utilisateur' }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Contenus récents</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $recentContents = \App\Models\Contenu::with(['categorie'])
                                    ->where('statut', 'publié')
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
                            @endphp
                            
                            @if($recentContents->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($recentContents as $content)
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">{{ $content->titre }}</h6>
                                                    <small class="text-muted">{{ $content->categorie->nom ?? 'Article' }}</small>
                                                </div>
                                                <small>{{ $content->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">Aucun contenu récent</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mes paiements récents</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $recentPayments = \App\Models\Payment::with(['contenu'])
                                    ->where('user_id', auth()->id())
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
                            @endphp
                            
                            @if($recentPayments->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($recentPayments as $payment)
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">{{ $payment->contenu->titre ?? 'Contenu' }}</h6>
                                                    <small class="text-muted">{{ $payment->amount }} FCFA</small>
                                                </div>
                                                <span class="badge bg-{{ $payment->status === 'approved' ? 'success' : ($payment->status === 'pending' ? 'warning' : 'danger') }}">
                                                    {{ $payment->status }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">Aucun paiement récent</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Actions rapides</h5>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <a href="{{ route('contenus.tous') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-book me-2"></i>Explorer les contenus
                                    </a>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="{{ route('payment.history') }}" class="btn btn-outline-success btn-sm w-100">
                                        <i class="fas fa-credit-card me-2"></i>Historique des paiements
                                    </a>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-info btn-sm w-100">
                                        <i class="fas fa-user me-2"></i>Mon profil
                                    </a>
                                </div>
                                @if(auth()->user()->role === 'admin')
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.index') }}" class="btn btn-outline-warning btn-sm w-100">
                                            <i class="fas fa-cog me-2"></i>Administration
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
