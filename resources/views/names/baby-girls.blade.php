@extends('layouts.app_full_width')

@section('content')
@if ($agent->isMobile())
<div class="row no-gutters">
  @else
  <div class="row">
    @endif
<div class="col-12 col-lg-8">
@if ($agent->isPhone())

@else
<div class="card mb-2">
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
@endif

<div class="card">
<div class="card-header">
<h4 class="text-xs-center">Muslim Girl Names A to Z Listing - Page: {{ Request::query('page') }}</h4>
</div>
<div class="card-body">
@foreach($names as $name)

<div class="row border mb-2 shadow-sm">
  <div class="col-1 vertical-align position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
    <a class="text-white stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a></div>
  <div class="col-11">
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
@include('partials.girls-letters')
</div>
<div class="col-lg-4 col-12 sidebar">
<div class="theiaStickySidebar">
@empty (Request::query('page'))
<div class="card mb-2">
<div class="card-header bg-warning"><h2 class="text-xs-center">Muslim Baby Girl Names</h2></div>
<div class="card-body"><p><strong>Muslim Girl Names</strong> with their meanings. Find Beautiful Girl Name for Muslim baby girl. Choose an unique <strong>Muslim girl name</strong> for your baby girl from the list of Girl Baby Names.</p>
<p>When you found a Beautiful Girl Name click 'Favorite' button to add names into your favorite list and view later</p>
</div>
</div>
@endempty

<!-- end letter menu -->
<!-- dua -->
<div class="card text-white bg-success mb-3">
  <div class="card-header">{{ $dua->name }}</div>
  <div class="card-body"><p>{{ $dua->translation }}</p></div>
  <div class="card-footer"><a href="{{ URL('/dua.php') }}">More Duas</a></div>
</div>
<!-- dua end -->
<div class="card mb-2">
<!-- n4m_app_rs -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-9750369232662797"
data-ad-slot="9464189006"
data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</div> <!-- endof right-side -->
</div>
@endsection
