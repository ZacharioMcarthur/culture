@extends('admin.layout')

@section('title', 'Gestion des Langues')

@section('breadcrumb')
    <li class="breadcrumb-item active">Langues</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Langues</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="languesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($langues as $langue)
                <tr>
                    <td>{{ $langue->id }}</td>
                    <td>{{ $langue->nom_langue }}</td>
                    <td>{{ $langue->code_langue }}</td>
                    <td>{{ Str::limit($langue->description, 50) }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm" onclick="viewLangue({{ $langue->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editLangue({{ $langue->id }})">
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
        {{ $langues->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#languesTable').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#languesTable_wrapper .col-md-6:eq(0)');
});
</script>
@endpush