@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
<h2>Show Details</h2>
</div>
<div class="col-md-12">
<a href="/mypanel/details/create" class="btn btn-success">Add New</a>
</div>
</div>
<div class="card">
    <div class="card-header">List</div>
    <div class="card-body">
    <table class="table table-bordered table-responsive" id="details-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach($details as $detail)
        <tr>
            <td>{{ $detail->id }}</td>
            <td>{{ $detail->names->name }}</td>
            <td>{{ $detail->title }}</td>
            <td>{{ $detail->content }}</td>
            <td><form action="/mypanel/details/{{ $detail->id }}" method="post">{{ method_field('DELETE') }}
                {{ csrf_field() }}
                <a class="btn btn-info">View</a>
                <a href="/mypanel/details/{{ $detail->id }}/edit" class="btn btn-success">Edit</a>
                <button type="submit" class="btn btn-danger">Del</button></form>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
