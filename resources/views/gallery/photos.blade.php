@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ URL::asset('/css/lightbox.min.css') }}">
@endsection
@section('content')
<div class="container bgc-fff">

<div class="card-columns">
@foreach ($photos as $photo)       

<div class="card">
<div class="card-body">
  <a href="storage/photos/full/{{ $photo->image }}" data-lightbox="{{ $photo->name }}" class="zoom" data-title="{{ $photo->description }}" data-type="image" data-toggle="lightbox">
    <img src="storage/photos/thumbnails/{{ $photo->image }}" alt="{{ $photo->name }}" class="img-fluid" />
    <span class="overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i></span>                      
  </a>
</div>
<div class="card-footer">
  <span><a href="#" title="{{ $photo->name }}">{{ $photo->name }}</a></span>
  @if( Auth::id() ==1)<span><a href="/photos/{{$photo->id}}" data-method="delete" class="btn btn-danger btn-sm jquery-postback"> <i class="fa fa-trash" aria-hidden="true"></i></a></span> @endif
  <span class="pull-right">
    <i class="fa fa-thumbs-up" aria-hidden="true"></i><span id="-bs3"></span>
  </span>
</div>
</div>  
@endforeach   
</div>
</div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/lightbox.min.js')}}"></script>
@endsection