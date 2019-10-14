@extends('layouts.admin')

@section('content')
    <h3>Details</h3>

    
    <div class="card">
        <div class="card-header">
            Create Additional Info
        </div>
        
        <div class="card-body">
            <form action="/mypanel/details" method="POST">            
                {{ csrf_field() }}
                <autocomplete></autocomplete>
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
                    <label for="content">Details</label>
                    <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
                    <p class="help-block"></p>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            
        </div>
    </div>


@stop

