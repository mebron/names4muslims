@extends('layouts.admin')

@section('content')
    <h3>Names</h3>

    
    <div class="card">
        <div class="card-header">
            Edit Name
        </div>
        
        <div class="card-body">
            <form action="/mypanel/names/{{ $name->id }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ $name->name }}">
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $name->gender }}">
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                </div>
            </div>
                <div class="form-group">
                    <label for="meaning">Meaning</label>
                    <textarea name="meaning" class="form-control" id="meaning" rows="3">{{ $name->meaning }}</textarea>
                    <p class="help-block"></p>
                    @if($errors->has('meaning'))
                        <p class="help-block">
                            {{ $errors->first('meaning') }}
                        </p>
                    @endif
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="arabic">Arabic</label>
                    <input type="text" class="form-control" id="arabic" name="arabic" value="{{ $name->arabic }}">
                    <p class="help-block"></p>
                    @if($errors->has('arabic'))
                        <p class="help-block">
                            {{ $errors->first('arabic') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $name->category }}">
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="origin">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" value="{{ $name->origin }}">
                    <p class="help-block"></p>
                    @if($errors->has('origin'))
                        <p class="help-block">
                            {{ $errors->first('origin') }}
                        </p>
                    @endif
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="root">Root</label>
                    <input type="text" class="form-control" id="root" name="root" value="{{ $name->root }}">
                    <p class="help-block"></p>
                    @if($errors->has('root'))
                        <p class="help-block">
                            {{ $errors->first('root') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-6">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $name->slug }}">
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
                </div>
                <div class="form-group">
                    <label for="alternate">Alternate</label>
                    <input type="text" class="form-control" id="alternate" name="alternate" value="{{ $name->alternate }}">
                    <p class="help-block"></p>
                    @if($errors->has('alternate'))
                        <p class="help-block">
                            {{ $errors->first('alternate') }}
                        </p>
                    @endif
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="user_id">User ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $name->user_id }}">
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="verified">Verified</label>
                    <select class="form-control" id="verified" name="verified">
                    {!! $name->verified === 1 ?'<option value="1" selected>Verified</option>' : '<option value="0" selected>No</option>' !!}
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('verified'))
                        <p class="help-block">
                            {{ $errors->first('verified') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="active">Active</label>
                    <select class="form-control" id="active" name="active">
                        {!! $name->active === 1 ?'<option value="1" selected>Active</option>' : '<option value="0" selected>No</option>' !!}
                       
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('active'))
                        <p class="help-block">
                            {{ $errors->first('active') }}
                        </p>
                    @endif
                </div>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $name->title }}">
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ $name->meta_description }}</textarea>
                    <p class="help-block"></p>
                    @if($errors->has('meta_description'))
                        <p class="help-block">
                            {{ $errors->first('meta_description') }}
                        </p>
                    @endif
                </div>                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>


@stop

