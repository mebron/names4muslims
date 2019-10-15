@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
      <div class="modal-dialog" role="document">
        <form action="/admin/roles" method="POST">
          @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="roleModalLabel">Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- name Form Input -->
            <div class="form-group @if ($errors->has('name')) has-error @endif">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="Role" placeholder="Role Name">
              @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
            <!-- Submit Form Button -->           
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="card rounded-0">
      <div class="card-header">
    <div class="row">
      <div class="col-md-5">
        <h3>Roles</h3>
      </div>
      <div class="col-md-7 page-action text-right">
        @can('add_roles')
        <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i
            class="glyphicon glyphicon-plus"></i> New</a>
        @endcan
      </div>
    </div>
      </div>
    <div class="card-body">
    @forelse ($roles as $role)
    
    <form action="/admin/roles/{{ $role->id }}" method="POST">
      @csrf
      @method('PUT')
    
    @if($role->name === 'Admin')
    @include('admin.shared._permissions', [
    'title' => $role->name .' Permissions',
    'options' => ['disabled'] ])
    @else
    @include('admin.shared._permissions', [
    'title' => $role->name .' Permissions',
    'model' => $role ])
    @can('edit_roles')
    <div class="row mt-0">
      <div class="col-12">
        <button class="btn btn-success float-right">Save</button>
      </div>
    </div>
    
    @endcan
    @endif
    
  </form>
    
    @empty
    <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
    </div>
    </div>
@endsection
