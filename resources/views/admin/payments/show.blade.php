@extends('admin.layout')

@section('title', 'Détails du Paiement')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails du Paiement #{{ $payment->id }}</h5>
                    <div>
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                        @if($payment->status === 'approved')
                            <form action="{{ route('payments.refund', $payment) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm ms-2"
                                        onclick="return confirm('Êtes-vous sûr de vouloir rembourser ce paiement ?')">
                                    <i class="fas fa-undo"></i> Rembourser
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informations générales</h6>
                            <table class="table table-sm">
                                <tr>
                                    <th>ID Transaction:</th>
                                    <td>{{ $payment->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>ID Client FedaPay:</th>
                                    <td>{{ $payment->feda_customer_id ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Montant:</th>
                                    <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                                </tr>
                                <tr>
                                    <th>Statut:</th>
                                    <td>
                                        @switch($payment->status)
                                            @case('approved')
                                                <span class="badge bg-success">Approuvé</span>
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
                                            @case('refunded')
                                                <span class="badge bg-info">Remboursé</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">{{ $payment->status }}</span>
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th>Méthode de paiement:</th>
                                    <td>{{ $payment->payment_method ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création:</th>
                                    <td>{{ $payment->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                                @if($payment->paid_at)
                                <tr>
                                    <th>Date de paiement:</th>
                                    <td>{{ $payment->paid_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Informations liées</h6>
                            <table class="table table-sm">
                                <tr>
                                    <th>Utilisateur:</th>
                                    <td>
                                        <strong>{{ $payment->user->name ?? 'N/A' }}</strong><br>
                                        <small>{{ $payment->user->email ?? 'N/A' }}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contenu:</th>
                                    <td>
                                        <a href="{{ route('contenus.show', $payment->contenu->id) }}" target="_blank">
                                            <strong>{{ $payment->contenu->titre }}</strong>
                                        </a><br>
                                        <small>{{ $payment->contenu->typeContenu->nom ?? 'N/A' }}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $payment->description ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($payment->status === 'approved')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-success">
                                <h6><i class="fas fa-check-circle"></i> Paiement réussi</h6>
                                <p class="mb-0">
                                    Ce paiement a été traité avec succès. L'utilisateur a accès au contenu premium.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($payment->status === 'pending')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-warning">
                                <h6><i class="fas fa-clock"></i> Paiement en attente</h6>
                                <p class="mb-0">
                                    Ce paiement est en cours de traitement. Le statut sera mis à jour automatiquement.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($payment->status === 'failed')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <h6><i class="fas fa-times-circle"></i> Paiement échoué</h6>
                                <p class="mb-0">
                                    Ce paiement a échoué. L'utilisateur n'a pas accès au contenu.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
