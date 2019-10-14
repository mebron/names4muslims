@extends('layouts.app')

@section('content')
@if(!$agent->isPhone())
<div class="row">
<div class="col-12">
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
</div>
@endif
<div class="card">
<div class="card-header">Most Favorited Baby Names</div>
<div class="card-body">

@foreach($names as $name)

<div class="row border mb-2 shadow-sm">
  <div class="col-1 vertical-align text-white position-relative {{ $name->names->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
    <a class="text-white stretched-link" href="{{ url('/name',$name->names->slug)}}.html">{{ $name->names->name[0] }}</a></div>
  <div class="col-11">
    <div class="row">
      <div class="col-12 pt-1 "><a class="name" href="{{ url('/name',$name->names->slug)}}.html">{{ $name->names->name }}</a>
      </div>
    </div>
    <div class="row">
      <div class="col-10"><span
          class="font-weight-light {{ $name->names->gender === "Boy" ? "blue-link" : "text-girl" }}">{{ $name->names->gender }}</span>
      </div>
      <div class="col-2 text-right" id="fav">
        @if (( Session::get('favorites')) && ($key = array_search($name->names->id, Session::get('favorites'))) !==
        false)
        <span class="text-warning" title="Shortlisted"><i class="fas fa-star"></i></span>
        @else
        <span title="Add to Favorites" id="{{ $name->names->id }}" class="{{ Auth::check() ? "myfav" : "fav" }}"><i
            class="far fa-star"></i></span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p class="font-weight-light">{{ strip_tags($name->names->meaning) }}</p>
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
@endsection
