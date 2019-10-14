@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
<h2>Names</h2>
</div>
<div class="col-md-12">
<a href="/mypanel/names/create" class="btn btn-success">Add New</a>
</div>
</div>
<div class="card">
    <div class="card-header">List</div>
    <div class="card-body">
    <table class="table table-bordered table-responsive" id="names-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Meaning</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#names-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'https://www.names4muslims.com/api/datatable/getdata',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'gender', name: 'gender' },
            { data: 'meaning', name: 'meaning' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush