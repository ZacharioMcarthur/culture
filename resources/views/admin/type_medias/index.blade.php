@extends('admin.layout')

@section('title', 'Types de Médias')

@section('breadcrumb')
    <li class="breadcrumb-item active">Types de Médias</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Types de Médias</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="typeMediasTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($typeMedias as $typeMedia)
                <tr>
                    <td>{{ $typeMedia->id }}</td>
                    <td>{{ $typeMedia->nom_media }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewTypeMedia({{ $typeMedia->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editTypeMedia({{ $typeMedia->id }})">
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
        {{ $typeMedias->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#typeMediasTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#typeMediasTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush