@extends('admin.layout')

@section('title', 'Gestion des Régions')

@section('breadcrumb')
    <li class="breadcrumb-item active">Régions</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Régions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="regionsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Population</th>
                    <th>Superficie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($regions as $region)
                <tr>
                    <td>{{ $region->id }}</td>
                    <td>{{ $region->nom_region }}</td>
                    <td>{{ $region->type_region }}</td>
                    <td>{{ Str::limit($region->description, 50) }}</td>
                    <td>{{ $region->population ? number_format($region->population) : 'N/A' }}</td>
                    <td>{{ $region->superficie ? $region->superficie . ' km²' : 'N/A' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewRegion({{ $region->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editRegion({{ $region->id }})">
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
        {{ $regions->links() }}
    </div>
</div>
<!-- /.card -->
@endsection

@push('scripts')
<script>
$(function () {
    $('#regionsTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#regionsTable_wrapper .col-md-6:eq(0)');
});

function viewRegion(id) {
    alert('Voir région ' + id);
}

function editRegion(id) {
    alert('Modifier région ' + id);
}
</script>
@endpush