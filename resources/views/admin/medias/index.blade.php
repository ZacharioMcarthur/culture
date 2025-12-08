@extends('admin.layout')

@section('title', 'Gestion des Médias')

@section('breadcrumb')
    <li class="breadcrumb-item active">Médias</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Médias</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="mediasTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contenu</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Langue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medias as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ Str::limit($media->contenu->titre ?? 'N/A', 30) }}</td>
                    <td>{{ $media->typeMedia->nom_media ?? 'N/A' }}</td>
                    <td>{{ Str::limit($media->description, 50) }}</td>
                    <td>{{ $media->langue->nom_langue ?? 'N/A' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewMedia({{ $media->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editMedia({{ $media->id }})">
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
        {{ $medias->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#mediasTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#mediasTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush