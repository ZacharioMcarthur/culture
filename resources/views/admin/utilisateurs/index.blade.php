@extends('admin.layout')

@section('title', 'Gestion des Utilisateurs')

@section('breadcrumb')
    <li class="breadcrumb-item active">Utilisateurs</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Utilisateurs</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">
                <i class="fas fa-plus"></i> Ajouter
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="usersTable" class="table table-bordered table-striped">
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
                @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->id }}</td>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>
                        @if($utilisateur->sexe === 'M')
                            <span class="badge badge-primary">Masculin</span>
                        @elseif($utilisateur->sexe === 'F')
                            <span class="badge badge-info">Féminin</span>
                        @else
                            <span class="badge badge-secondary">Non spécifié</span>
                        @endif
                    </td>
                    <td>{{ $utilisateur->role->nom_role ?? 'N/A' }}</td>
                    <td>
                        @if($utilisateur->statut === 'valide')
                            <span class="badge badge-success">Validé</span>
                        @elseif($utilisateur->statut === 'en_attente')
                            <span class="badge badge-warning">En attente</span>
                        @elseif($utilisateur->statut === 'bloque')
                            <span class="badge badge-danger">Bloqué</span>
                        @else
                            <span class="badge badge-secondary">Désactivé</span>
                        @endif
                    </td>
                    <td>{{ $utilisateur->date_inscription ? \Carbon\Carbon::parse($utilisateur->date_inscription)->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewUser({{ $utilisateur->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editUser({{ $utilisateur->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser({{ $utilisateur->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {{ $utilisateurs->links() }}
    </div>
</div>
<!-- /.card -->

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addUserModalLabel">Ajouter un Utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addUserForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" id="sexe" name="sexe">
                            <option value="">Non spécifié</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_role">Rôle</label>
                        <select class="form-control" id="id_role" name="id_role" required>
                            <option value="">Sélectionner un rôle</option>
                            <!-- Options will be populated via AJAX -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#usersTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#usersTable_wrapper .col-md-6:eq(0)');

    // Load roles for the select
    $.get('/admin/api/roles', function(data) {
        $('#id_role').empty().append('<option value="">Sélectionner un rôle</option>');
        data.forEach(function(role) {
            $('#id_role').append('<option value="' + role.id + '">' + role.nom_role + '</option>');
        });
    });
});

function viewUser(id) {
    // Implement view functionality
    alert('Voir utilisateur ' + id);
}

function editUser(id) {
    // Implement edit functionality
    alert('Modifier utilisateur ' + id);
}

function deleteUser(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
        // Implement delete functionality
        alert('Supprimer utilisateur ' + id);
    }
}
</script>
@endpush