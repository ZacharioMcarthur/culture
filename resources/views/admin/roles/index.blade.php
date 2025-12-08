@extends('admin.layout')

@section('title', 'Gestion des Rôles')

@section('breadcrumb')
    <li class="breadcrumb-item active">Rôles</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Rôles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="rolesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->nom_role }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewRole({{ $role->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editRole({{ $role->id }})">
                                <i class="fas fa-edit"></i>
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
        {{ $roles->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#rolesTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#rolesTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush