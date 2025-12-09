@extends('admin.layout')

@section('title', 'Gestion des utilisateurs')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Utilisateurs</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des utilisateurs</h3>
            <div class="card-tools">
                <a href="{{ route('admin.utilisateurs.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Ajouter un utilisateur
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="utilisateurs-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Sexe</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#utilisateurs-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.utilisateurs.index') }}",
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
        },
        "columns": [
            { "data": "id", "name": "id" },
            { "data": "nom", "name": "nom" },
            { "data": "prenom", "name": "prenom" },
            { "data": "email", "name": "email" },
            { "data": "sexe_badge", "name": "sexe", "orderable": false },
            { "data": "role_nom", "name": "id_role" },
            { "data": "statut_badge", "name": "statut", "orderable": false },
            { "data": "date_inscription", "name": "date_inscription" },
            { "data": "actions", "name": "actions", "orderable": false, "searchable": false }
        ]
    });
});
</script>
@endpush
