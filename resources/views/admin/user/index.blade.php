@extends('layouts.app')

@section('content')
<div class="card rounded-0">
  <div class="card-header">
    <div class="row">
      <div class="col-md-5">
        <h3 class="modal-title">{{ $users->total() }} {{ str_plural('User', $users->count()) }} </h3>
      </div>
      <div class="col-md-7 page-action text-right">
        @can('add_users')
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i>
          Create</a>
        @endcan
      </div>
    </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped table-hover" id="data-table">
        <thead class="bg-primary">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
            @can('edit_users', 'delete_users')
            <th class="text-center">Actions</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->implode('name', ', ') }}</td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
    
            @can('edit_users')
            <td class="text-center">
              @include('admin.shared._actions', [
              'entity' => 'users',
              'id' => $user->id
              ])
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    
      <div class="text-center">
        {{ $users->links() }}
      </div>
    </div>
</div>
@endsection
