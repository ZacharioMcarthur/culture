@extends('admin.layout')

@section('title', 'Types de Contenus')

@section('breadcrumb')
    <li class="breadcrumb-item active">Types de Contenus</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Types de Contenus</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="typeContenusTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($typeContenus as $typeContenu)
                <tr>
                    <td>{{ $typeContenu->id }}</td>
                    <td>{{ $typeContenu->nom_contenu }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewTypeContenu({{ $typeContenu->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editTypeContenu({{ $typeContenu->id }})">
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
        {{ $typeContenus->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#typeContenusTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#typeContenusTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush