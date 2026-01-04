@extends('layouts.app')

@section('title', 'Historique des Paiements')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Mon Historique de Paiements</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($payments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Contenu</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>
                                            <a href="{{ route('contenusdetails', $payment->contenu->id) }}" target="_blank">
                                                {{ Str::limit($payment->contenu->titre, 40) }}
                                            </a>
                                        </td>
                                        <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                                        <td>
                                            @switch($payment->status)
                                                @case('approved')
                                                    <span class="badge bg-success">Payé</span>
                                                    @break
                                                @case('pending')
                                                    <span class="badge bg-warning">En attente</span>
                                                    @break
                                                @case('failed')
                                                    <span class="badge bg-danger">Échoué</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="badge bg-secondary">Annulé</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">{{ $payment->status }}</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            @if($payment->status === 'approved')
                                                <a href="{{ route('contenusdetails', $payment->contenu->id) }}" 
                                                   class="btn btn-primary btn-sm" target="_blank">
                                                    <i class="fas fa-eye"></i> Voir
                                                </a>
                                            @elseif($payment->status === 'pending')
                                                <span class="text-muted">En cours...</span>
                                            @else
                                                <a href="{{ route('payment.initiate', $payment->contenu->id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-redo"></i> Retenter
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                Affichage de {{ $payments->firstItem() }} à {{ $payments->lastItem() }} 
                                sur {{ $payments->total() }} paiements
                            </div>
                            {{ $payments->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
                            <h5>Aucun paiement</h5>
                            <p class="text-muted">Vous n'avez effectué aucun paiement pour le moment.</p>
                            <a href="{{ route('contenustous') }}" class="btn btn-primary">
                                <i class="fas fa-search"></i> Explorer les contenus
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
