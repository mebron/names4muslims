@extends('layouts.admin')

@section('content')
<div class="card rounded-0">
  <div class="card-header">
  <div class="row">
    <div class="col-md-5">
      <h3>Edit User: <span class="text-danger">{{ $user->name }}</span></h3>
    </div>
    <div class="col-md-7 page-action text-right">
      <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
    </div>
  </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-content">
            <form action="/admin/users/{{ $user->id }}" method="POST">
              @csrf
              @method('PUT')
            <!-- Name Form Input -->
            <div class="form-group @if ($errors->has('name')) has-error @endif">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{ $user->name }}">
              @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>

            <!-- email Form Input -->
            <div class="form-group @if ($errors->has('email')) has-error @endif">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
              @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>

            <!-- password Form Input -->
            <div class="form-group @if ($errors->has('password')) has-error @endif">
              <label for="email">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter password if you need to change">
              @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>

            <!-- Roles Form Input -->
            <div class="form-group @if ($errors->has('roles')) has-error @endif">
              <label for="email">User Roles</label>
              <select multiple class="form-control" name="roles[]" id="roles">
                @foreach($roles as $role)

                <option value="{{ $role->id }}" @if($user->hasRole($role->name)) selected="selected" @endif>{{ $role->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
            </div>

            <!-- Permissions -->
            @if(isset($user))
            @include('admin.shared._permissions', ['closed' => 'true', 'model' => $user ])
            @endif
            <!-- Submit Form Button -->
            <button class="btn btn-success float-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
