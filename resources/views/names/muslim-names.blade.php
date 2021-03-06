@extends('layouts.app')

@section('content')
<div class="card mb-3">
<!-- N4M RESPONSIVE -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-9750369232662797"
data-ad-slot="9868081403"
data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<div class="card mb-3">
<div class="card-header text-white" style="background-color: #C2D985;"><h2>Muslim Baby Names</h2></div>
<div class="card-body">
@foreach($names as $name)

<div class="row border mb-2 shadow-sm">
  <div class="col-2 col-md-1 vertical-align position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
    <a class="text-dark stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a></div>
  <div class="col-10 col-md-11">
    <div class="row">
      <div class="col-12 pt-1 "><a class="name" href="{{ url('/name',$name->slug)}}.html">{{ $name->name }}</a>
      </div>
    </div>
    <div class="row">
      <div class="col-10"><span
          class="font-weight-light {{ $name->gender === "Boy" ? "blue-link" : "text-girl" }}">{{ $name->gender }}</span>
      </div>
      <div class="col-2 text-right" id="fav">
        @if (( Session::get('favorites')) && ($key = array_search($name->id, Session::get('favorites'))) !==
        false)
        <span class="text-warning" title="Shortlisted"><i class="fas fa-star"></i></span>
        @else
        <span title="Add to Favorites" id="{{ $name->id }}" class="{{ Auth::check() ? "myfav" : "fav" }}"><i
            class="far fa-star"></i></span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p class="font-weight-light">{{ strip_tags($name->meaning) }}</p>
      </div>
    </div>
  </div>
</div>

@if($loop->index == 11)
<div class="row">
  <div class="col-12 p-0">
    <!-- N4M RESPONSIVE -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797" data-ad-slot="9868081403"
      data-ad-format="auto"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</div>
@endif
@endforeach
</div>
@include('partials.pagination')
</div>
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="Info" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $('.pop').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#popup').modal({show:true});
        });
    });
});
</script>
@endsection
