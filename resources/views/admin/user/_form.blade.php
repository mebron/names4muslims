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
  <label for="email">Email address</label>
  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" value="{{ $user->password }}">
  @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">  
  <label for="email">Email address</label>
  <select multiple class="form-control" name="roles[]" id="roles">
    @foreach($roles as $role)
    <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach  
  </select>
  @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
@include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif
