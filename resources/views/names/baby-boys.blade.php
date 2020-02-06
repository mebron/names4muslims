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
<li class="breadcrumb-item"><a href="/muslim-boy-names">Boy Names</a></li>
<li class="breadcrumb-item active">Page: {{ Request::query('page') }}</li>
</ol>
@if (!$agent->isMobile())
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
<h4 class="text-xs-center">Muslim Boy Names A-Z Listing - Page: {{ Request::query('page') }}</h4>
</div>
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
</div>
<div class="col-lg-4 col-12">
<div class="sidebar">
<div class="theiaStickySidebar">
@empty (Request::query('page'))
<div class="card mb-2">
<div class="card-header text-white bg-primary"><h2 class="text-xs-center">Muslim Boy Names</h2></div>
<div class="card-body"><p><strong>Muslim Baby Boy Name</strong> with Meanings. Alphabetical list of <strong>Baby Boy Names</strong> for <strong>Muslim babies</strong>. Choose an <strong>Islamic/Muslim</strong> baby name from our Baby Boy names list.</p>
<p>If you found any nice and beautiful <strong>Baby Boy Name</strong> from our best collections of Muslim Boy Names, then click the favorite button to shortlist your selected names and you can view the names collection later.</p>
</div>
</div>
@endempty

<div class="card mb-2">
<div class="card-header bg-aqua"><h3>Muslim Boy Names</h3></div>
<table class="table table-sm">
<tr>
<td><a href="/boy-names-starting-with-a" title="Muslim Boy Names Start With A" class="btn btn-md btn-lblue">A</a></td>
<td><a href="/boy-names-starting-with-b" title="Muslim Boy Names Start With B" class="btn btn-md btn-lblue">B</a></td>
<td><a href="/boy-names-starting-with-c" title="Muslim Boy Names Start With C" class="btn btn-md btn-lblue">C</a></td>
<td><a href="/boy-names-starting-with-d" title="Muslim Boy Names Start With D" class="btn btn-md btn-lblue">D</a></td>
<td><a href="/boy-names-starting-with-e" title="Muslim Boy Names Start With E" class="btn btn-md btn-lblue">E</a></td>
<td><a href="/boy-names-starting-with-f" title="Muslim Boy Names Start With F" class="btn btn-md btn-lblue">F</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-g" title="Muslim Boy Names Start With G" class="btn btn-md btn-lblue">G</a></td>
<td><a href="/boy-names-starting-with-h" title="Muslim Boy Names Start With H" class="btn btn-md btn-lblue">H</a></td>
<td><a href="/boy-names-starting-with-i" title="Muslim Boy Names Start With I" class="btn btn-md btn-lblue">I</a></td>
<td><a href="/boy-names-starting-with-j" title="Muslim Boy Names Start With J" class="btn btn-md btn-lblue">J</a></td>
<td><a href="/boy-names-starting-with-k" title="Muslim Boy Names Start With K" class="btn btn-md btn-lblue">K</a></td>
<td><a href="/boy-names-starting-with-l" title="Muslim Boy Names Start With L" class="btn btn-md btn-lblue">L</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-m" title="Muslim Boy Names Start With M" class="btn btn-md btn-lblue">M</a></td>
<td><a href="/boy-names-starting-with-n" title="Muslim Boy Names Start With N" class="btn btn-md btn-lblue">N</a></td>
<td><a href="/boy-names-starting-with-o" title="Muslim Boy Names Start With O" class="btn btn-md btn-lblue">O</a></td>
<td><a href="/boy-names-starting-with-p" title="Muslim Boy Names Start With P" class="btn btn-md btn-lblue">P</a></td>
<td><a href="/boy-names-starting-with-q" title="Muslim Boy Names Start With Q" class="btn btn-md btn-lblue">Q</a></td>
<td><a href="/boy-names-starting-with-r" title="Muslim Boy Names Start With R" class="btn btn-md btn-lblue">R</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-s" title="Muslim Boy Names Start With S" class="btn btn-md btn-lblue">S</a></td>
<td><a href="/boy-names-starting-with-t" title="Muslim Boy Names Start With T" class="btn btn-md btn-lblue">T</a></td>
<td><a href="/boy-names-starting-with-u" title="Muslim Boy Names Start With Q" class="btn btn-md btn-lblue">U</a></td>
<td><a href="/boy-names-starting-with-v" title="Muslim Boy Names Start With V" class="btn btn-md btn-lblue">V</a></td>
<td><a href="/boy-names-starting-with-w" title="Muslim Boy Names Start With W" class="btn btn-md btn-lblue">W</a></td>
<td><a href="/boy-names-starting-with-x" title="Muslim Boy Names Start With X" class="btn btn-md btn-lblue">X</a></td>
</tr>
<tr>
<td></td>
<td></td>
<td><a href="/boy-names-starting-with-y" title="Muslim Boy Names Start With Y" class="btn btn-md btn-lblue">Y</a></td>
<td><a href="/boy-names-starting-with-z" title="Muslim Boy Names Start With Z" class="btn btn-md btn-lblue">Z</a></td>
<td></td>
<td></td>
</tr>
</table>
</div>
<!-- dua -->
<div class="card text-white bg-success mb-3">
  <div class="card-header">{{ $dua->name }}</div>
  <div class="card-body"><p>{{ $dua->translation }}</p></div>
  <div class="card-footer"><a href="{{ URL('/dua.php') }}">More Duas</a></div>
</div>
<!-- dua end -->
<!-- end letter menu -->
<div class="card mb-3">
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
</div>
</div> <!-- endof right-side -->
</div>
@endsection
