@extends('admin.layout')

@section('title', 'Gestion des Commentaires')

@section('breadcrumb')
    <li class="breadcrumb-item active">Commentaires</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Commentaires</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="commentairesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Contenu</th>
                    <th>Commentaire</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commentaires as $commentaire)
                <tr>
                    <td>{{ $commentaire->id }}</td>
                    <td>{{ $commentaire->utilisateur->prenom ?? 'N/A' }} {{ $commentaire->utilisateur->nom ?? '' }}</td>
                    <td>{{ Str::limit($commentaire->contenu->titre ?? 'N/A', 30) }}</td>
                    <td>{{ Str::limit($commentaire->texte, 50) }}</td>
                    <td>
                        @if($commentaire->note)
                            <span class="badge badge-warning">{{ $commentaire->note }}/5</span>
                        @else
                            <span class="text-muted">Aucune</span>
                        @endif
                    </td>
                    <td>{{ $commentaire->formatted_date }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewCommentaire({{ $commentaire->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteCommentaire({{ $commentaire->id }})">
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
        {{ $commentaires->links() }}
    </div>
</div>
<!-- /.card -->
@endsection

@push('scripts')
<script>
$(function () {
    $('#commentairesTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#commentairesTable_wrapper .col-md-6:eq(0)');
});

function viewCommentaire(id) {
    alert('Voir commentaire ' + id);
}

function deleteCommentaire(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) {
        alert('Supprimer commentaire ' + id);
    }
}
</script>
@endpush