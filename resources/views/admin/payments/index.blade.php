@extends('admin.layout')

@section('title', 'Gestion des Paiements')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Gestion des Paiements</h5>
                    <div>
                        <a href="{{ route('export.payments') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-download"></i> Exporter
                        </a>
                    </div>
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

                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="paymentsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Contenu</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Méthode</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>
                                        <a href="#" title="{{ $payment->user->email }}">
                                            {{ $payment->user->name ?? 'N/A' }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('contenus.show', $payment->contenu->id) }}" target="_blank">
                                            {{ Str::limit($payment->contenu->titre, 30) }}
                                        </a>
                                    </td>
                                    <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
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
                                    <td>{{ $payment->payment_method ?? 'N/A' }}</td>
                                    <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('payments.show', $payment) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($payment->status === 'approved')
                                                <form action="{{ route('payments.refund', $payment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning" 
                                                            onclick="return confirm('Êtes-vous sûr de vouloir rembourser ce paiement ?')">
                                                        <i class="fas fa-undo"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Affichage de {{ $payments->firstItem() }} à {{ $payments->lastItem() }} 
                            sur {{ $payments->total() }} entrées
                        </div>
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#paymentsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr.json'
        },
        order: [[0, 'desc']],
        pageLength: 25
    });
});
</script>
@endpush
