@extends('admin.layout')

@section('title', 'Langues par Région')

@section('breadcrumb')
    <li class="breadcrumb-item active">Langues par Région</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Relations Langues - Régions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="parlerTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Région</th>
                    <th>Langue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parler as $relation)
                <tr>
                    <td>{{ $relation->region->nom_region ?? 'N/A' }}</td>
                    <td>{{ $relation->langue->nom_langue ?? 'N/A' }}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteRelation({{ $relation->region_id }}, {{ $relation->langue_id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {{ $parler->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#parlerTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#parlerTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush