@extends('admin.layout')

@section('title', 'Gestion des Contenus')

@section('breadcrumb')
    <li class="breadcrumb-item active">Contenus</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Contenus</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="contenusTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Auteur</th>
                    <th>Région</th>
                    <th>Langue</th>
                    <th>Statut</th>
                    <th>Date création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contenus as $contenu)
                <tr>
                    <td>{{ $contenu->id }}</td>
                    <td>{{ Str::limit($contenu->titre, 50) }}</td>
                    <td>{{ $contenu->typeContenu->nom_contenu ?? 'N/A' }}</td>
                    <td>{{ $contenu->auteur->prenom ?? 'N/A' }} {{ $contenu->auteur->nom ?? '' }}</td>
                    <td>{{ $contenu->region->nom_region ?? 'N/A' }}</td>
                    <td>{{ $contenu->langue->nom_langue ?? 'N/A' }}</td>
                    <td>
                        @if($contenu->statut === 'valide')
                            <span class="badge badge-success">Validé</span>
                        @elseif($contenu->statut === 'en_attente')
                            <span class="badge badge-warning">En attente</span>
                        @elseif($contenu->statut === 'bloque')
                            <span class="badge badge-danger">Bloqué</span>
                        @endif
                    </td>
                    <td>{{ $contenu->date_creation ? \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewContenu({{ $contenu->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editContenu({{ $contenu->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteContenu({{ $contenu->id }})">
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
        {{ $contenus->links() }}
    </div>
</div>
<!-- /.card -->
@endsection

@push('scripts')
<script>
$(function () {
    $('#contenusTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#contenusTable_wrapper .col-md-6:eq(0)');
});

function viewContenu(id) {
    alert('Voir contenu ' + id);
}

function editContenu(id) {
    alert('Modifier contenu ' + id);
}

function deleteContenu(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')) {
        alert('Supprimer contenu ' + id);
    }
}
</script>
@endpush