@extends('layouts.app_full_width')

@section('content')
@if ($agent->isMobile())
<div class="row no-gutters">
  @else
  <div class="row">
    @endif
<div class="col-12 col-lg-8">
<ol class="breadcrumb mb-2">
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/baby-names">Baby Names</a></li>
<li class="breadcrumb-item"><a href="/muslim-girl-names">Muslim Girl Names</a></li>
<li class="breadcrumb-item active">Page: {{ Request::query('page') }}</li>
</ol>
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
<div class="card mb-2">
<div class="card-header girl-pink"><h3 class="text-xs-center">Unique Muslim Girl Names</h3></div>
<div class="card-body">
<a href="/girl-names-starting-with-a" title="Muslim Girl Names Start With A" class="btn btn-md btn-lpink m-1">A</a>
<a href="/girl-names-starting-with-b" title="Muslim Girl Names Start With B" class="btn btn-md btn-lpink m-1">B</a>
<a href="/girl-names-starting-with-c" title="Muslim Girl Names Start With C" class="btn btn-md btn-lpink m-1">C</a>
<a href="/girl-names-starting-with-d" title="Muslim Girl Names Start With D" class="btn btn-md btn-lpink m-1">D</a>
<a href="/girl-names-starting-with-e" title="Muslim Girl Names Start With E" class="btn btn-md btn-lpink m-1">E</a>
<a href="/girl-names-starting-with-f" title="Muslim Girl Names Start With F" class="btn btn-md btn-lpink m-1">F</a>
<a href="/girl-names-starting-with-g" title="Muslim Girl Names Start With G" class="btn btn-md btn-lpink m-1">G</a>
<a href="/girl-names-starting-with-h" title="Muslim Girl Names Start With H" class="btn btn-md btn-lpink m-1">H</a>
<a href="/girl-names-starting-with-i" title="Muslim Girl Names Start With I" class="btn btn-md btn-lpink m-1">I</a>
<a href="/girl-names-starting-with-j" title="Muslim Girl Names Start With J" class="btn btn-md btn-lpink m-1">J</a>
<a href="/girl-names-starting-with-k" title="Muslim Girl Names Start With K" class="btn btn-md btn-lpink m-1">K</a>
<a href="/girl-names-starting-with-l" title="Muslim Girl Names Start With L" class="btn btn-md btn-lpink m-1">L</a>
<a href="/girl-names-starting-with-m" title="Muslim Girl Names Start With M" class="btn btn-md btn-lpink m-1">M</a>
<a href="/girl-names-starting-with-n" title="Muslim Girl Names Start With N" class="btn btn-md btn-lpink m-1">N</a>
<a href="/girl-names-starting-with-o" title="Muslim Girl Names Start With O" class="btn btn-md btn-lpink m-1">O</a>
<a href="/girl-names-starting-with-p" title="Muslim Girl Names Start With P" class="btn btn-md btn-lpink m-1">P</a>
<a href="/girl-names-starting-with-q" title="Muslim Girl Names Start With Q" class="btn btn-md btn-lpink m-1">Q</a>
<a href="/girl-names-starting-with-r" title="Muslim Girl Names Start With R" class="btn btn-md btn-lpink m-1">R</a>
<a href="/girl-names-starting-with-s" title="Muslim Girl Names Start With S" class="btn btn-md btn-lpink m-1">S</a>
<a href="/girl-names-starting-with-t" title="Muslim Girl Names Start With T" class="btn btn-md btn-lpink m-1">T</a>
<a href="/girl-names-starting-with-u" title="Muslim Girl Names Start With Q" class="btn btn-md btn-lpink m-1">U</a>
<a href="/girl-names-starting-with-v" title="Muslim Girl Names Start With V" class="btn btn-md btn-lpink m-1">V</a>
<a href="/girl-names-starting-with-w" title="Muslim Girl Names Start With W" class="btn btn-md btn-lpink m-1">W</a>
<a href="/girl-names-starting-with-x" title="Muslim Girl Names Start With X" class="btn btn-md btn-lpink m-1">X</a>
<a href="/girl-names-starting-with-y" title="Muslim Girl Names Start With Y" class="btn btn-md btn-lpink m-1">Y</a>
<a href="/girl-names-starting-with-z" title="Muslim Girl Names Start With Z" class="btn btn-md btn-lpink m-1">Z</a>
</div>
</div>
<div class="card">
<div class="card-header">
<h4 class="text-xs-center">Muslim Baby Girl Names A to Z Listing - Page: {{ Request::query('page') }}</h4>
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
