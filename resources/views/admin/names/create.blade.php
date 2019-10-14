@extends('layouts.admin')

@section('content')
    <h3>Names</h3>

    
    <div class="card">
        <div class="card-header">
            Create
        </div>
        
        <div class="card-body">
            <form action="/mypanel/names" method="post">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::id() }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{ old('name') }}" required>
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender" required>
                        <option value="" selected="selected">Gender</option>
                        <option value="Boy">Boy</option>
                        <option value="Girl">Girl</option>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="text-danger">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                </div>
            </div>
                <div class="form-group">
                    <label for="meaning">Meaning</label>
                    <textarea name="meaning" class="form-control" id="meaning" rows="3" required>{{ old('meaning') }}</textarea>
                    <p class="help-block"></p>
                    @if($errors->has('meaning'))
                        <p class="invalid-feedback">
                            {{ $errors->first('meaning') }}
                        </p>
                    @endif
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="arabic">Arabic</label>
                    <input type="text" class="form-control" id="arabic" name="arabic" placeholder="Arabic" value="{{ old('arabic') }}">
                    <p class="help-block"></p>
                    @if($errors->has('arabic'))
                        <p class="help-block">
                            {{ $errors->first('arabic') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}">
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group col-md-4">
                    <label for="origin">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin') }}">
                    <p class="help-block"></p>
                    @if($errors->has('origin'))
                        <p class="invalid-feedback">
                            {{ $errors->first('origin') }}
                        </p>
                    @endif
                </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-3">
                    <label for="root">Root</label>
                    <input type="text" class="form-control" id="root" name="root" value="{{ old('root') }}">
                    <p class="help-block"></p>
                    @if($errors->has('root'))
                        <p class="help-block">
                            {{ $errors->first('root') }}
                        </p>
                    @endif
                </div>
                <div class="form-group col-md-9">
                    <label for="alternate">Alternate Spelling</label>
                    <input type="text" class="form-control" id="alternate" name="alternate" value="{{ old('alternate') }}">
                    <p class="help-block"></p>
                    @if($errors->has('alternate'))
                        <p class="help-block">
                            {{ $errors->first('alternate') }}
                        </p>
                    @endif
                </div>
            </div>
                <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="verified">Verified</label>
                    <select class="form-control" id="verified" name="verified">
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
            
                <div class="form-group col-md-6">
                    <label for="active">Active</label>
                    <select class="form-control" id="active" name="active">
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
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ old('meta_description') }}</textarea>
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

