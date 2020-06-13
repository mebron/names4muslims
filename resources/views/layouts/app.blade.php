<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEO::generate() !!}
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="//cdn.names4muslims.com/assets/ico/favicon.png">
<link rel="apple-touch-icon" href="//cdn.names4muslims.com/assets/ico/apple-touch-icon-144-precomposed.png"/>
<!-- Styles -->
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" defer></script>
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
<link rel="dns-prefetch" href="//connect.facebook.net">
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
@yield('styles')
<!-- Scripts -->
<script>
window.Laravel = <?php
echo json_encode([
'csrfToken' => csrf_token(),
]);
?>
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-9750369232662797",
          enable_page_level_ads: true
     });
</script>
</head>
<body>
<div id="app">
@if (!$agent->isMobile())
<header class="white-bg">
<div class="container">
<div class="row clearfix">
<div class="col-xs-12 col-sm-4 col-lg-4">
<div class="logo"><img src="//cdn.names4muslims.com/assets/img/logo.png" alt="Muslim Names" title="Muslim Names" class="img-fluid" /></div>
</div>
<div class="d-none d-sm-block col-sm-8 col-lg-8">
<h1 class="float-right text-info">{{ Str::before(SEOMeta::getTitle('title'),'|') ?? 'Muslim Names with Meaning' }}</h1>
</div>
</div>
</div>
</header>
@endif
@include('partials.main-menu')
<!-- /navbar -->
@if ($agent->isMobile())
<div class="container-fluid px-1">
<div class="row no-gutters">
@else
<div class="container pt-3">
<div class="row">
@endif
<div class="col-12 col-lg-8">
@yield('content')
</div>
<div class="col-12 col-lg-4 sidebar">
<div class="theiaStickySidebar">
<!-- start letter menu -->
@if(Request::is('boy-names-starting-with-*') ?? Request::is('muslim-boy-names') ?? Request::is('baby-names') ?? Request::is('most-popular-names'))
<div class="card mb-2">
<div class="card-header white" style="background: #C4E9FF;"><h4>Alphabetic List of Boy Names</h4></div>
<div class="card-body">
<table class="table table-sm">
<tr>
<td><a href="/boy-names-starting-with-a" title="Muslim Boy Name Start With A" class="btn btn-md btn-lblue">A</a></td>
<td><a href="/boy-names-starting-with-b" title="Muslim Boy Name Start With B" class="btn btn-md btn-lblue">B</a></td>
<td><a href="/boy-names-starting-with-c" title="Muslim Boy Name Start With C" class="btn btn-md btn-lblue">C</a></td>
<td><a href="/boy-names-starting-with-d" title="Muslim Boy Name Start With D" class="btn btn-md btn-lblue">D</a></td>
<td><a href="/boy-names-starting-with-e" title="Muslim Boy Name Start With E" class="btn btn-md btn-lblue">E</a></td>
<td><a href="/boy-names-starting-with-f" title="Muslim Boy Name Start With F" class="btn btn-md btn-lblue">F</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-g" title="Muslim Boy Name Start With G" class="btn btn-md btn-lblue">G</a></td>
<td><a href="/boy-names-starting-with-h" title="Muslim Boy Name Start With H" class="btn btn-md btn-lblue">H</a></td>
<td><a href="/boy-names-starting-with-i" title="Muslim Boy Name Start With I" class="btn btn-md btn-lblue px-3">I</a></td>
<td><a href="/boy-names-starting-with-j" title="Muslim Boy Name Start With J" class="btn btn-md btn-lblue">J</a></td>
<td><a href="/boy-names-starting-with-k" title="Muslim Boy Name Start With K" class="btn btn-md btn-lblue">K</a></td>
<td><a href="/boy-names-starting-with-l" title="Muslim Boy Name Start With L" class="btn btn-md btn-lblue">L</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-m" title="Muslim Boy Name Start With M" class="btn btn-md btn-lblue">M</a></td>
<td><a href="/boy-names-starting-with-n" title="Muslim Boy Name Start With N" class="btn btn-md btn-lblue">N</a></td>
<td><a href="/boy-names-starting-with-o" title="Muslim Boy Name Start With O" class="btn btn-md btn-lblue">O</a></td>
<td><a href="/boy-names-starting-with-p" title="Muslim Boy Name Start With P" class="btn btn-md btn-lblue">P</a></td>
<td><a href="/boy-names-starting-with-q" title="Muslim Boy Name Start With Q" class="btn btn-md btn-lblue">Q</a></td>
<td><a href="/boy-names-starting-with-r" title="Muslim Boy Name Start With R" class="btn btn-md btn-lblue">R</a></td>
</tr>
<tr>
<td><a href="/boy-names-starting-with-s" title="Muslim Boy Name Start With S" class="btn btn-md btn-lblue">S</a></td>
<td><a href="/boy-names-starting-with-t" title="Muslim Boy Name Start With T" class="btn btn-md btn-lblue">T</a></td>
<td><a href="/boy-names-starting-with-u" title="Muslim Boy Name Start With Q" class="btn btn-md btn-lblue">U</a></td>
<td><a href="/boy-names-starting-with-v" title="Muslim Boy Name Start With V" class="btn btn-md btn-lblue">V</a></td>
<td><a href="/boy-names-starting-with-w" title="Muslim Boy Name Start With W" class="btn btn-md btn-lblue">W</a></td>
<td><a href="/boy-names-starting-with-x" title="Muslim Boy Name Start With X" class="btn btn-md btn-lblue">X</a></td>
</tr>
<tr>
<td></td>
<td></td>
<td><a href="/boy-names-starting-with-y" title="Muslim Boy Name Start With Y" class="btn btn-md btn-lblue">Y</a></td>
<td><a href="/boy-names-starting-with-z" title="Muslim Boy Name Start With Z" class="btn btn-md btn-lblue">Z</a></td>
<td></td>
<td></td>
</tr>
</table>
</div>
</div>
@endif
<div class="card mb-2">
  <div class="card-body">
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
@if(Request::is('girl-names-starting-with-*') ?? Request::is('muslim-girl-names') ?? Request::is('baby-names') ?? Request::is('most-popular-names'))
<div class="card mb-2">
<div class="card-header girl-pink"><h4 class="text-xs-center">Alphabetic List of Girl Names</h4></div>
<div class="card-body">
<table class="table table-sm">
<tr>
<td><a href="/girl-names-starting-with-a" title="Muslim Girl Name Start With A" class="btn btn-md btn-lpink">A</a></td>
<td><a href="/girl-names-starting-with-b" title="Muslim Girl Name Start With B" class="btn btn-md btn-lpink">B</a></td>
<td><a href="/girl-names-starting-with-c" title="Muslim Girl Name Start With C" class="btn btn-md btn-lpink">C</a></td>
<td><a href="/girl-names-starting-with-d" title="Muslim Girl Name Start With D" class="btn btn-md btn-lpink">D</a></td>
<td><a href="/girl-names-starting-with-e" title="Muslim Girl Name Start With E" class="btn btn-md btn-lpink">E</a></td>
<td><a href="/girl-names-starting-with-f" title="Muslim Girl Name Start With F" class="btn btn-md btn-lpink">F</a></td>
</tr>
<tr>
<td><a href="/girl-names-starting-with-g" title="Muslim Girl Name Start With G" class="btn btn-md btn-lpink">G</a></td>
<td><a href="/girl-names-starting-with-h" title="Muslim Girl Name Start With H" class="btn btn-md btn-lpink">H</a></td>
<td><a href="/girl-names-starting-with-i" title="Muslim Girl Name Start With I" class="btn btn-md btn-lpink px-3">I</a></td>
<td><a href="/girl-names-starting-with-j" title="Muslim Girl Name Start With J" class="btn btn-md btn-lpink">J</a></td>
<td><a href="/girl-names-starting-with-k" title="Muslim Girl Name Start With K" class="btn btn-md btn-lpink">K</a></td>
<td><a href="/girl-names-starting-with-l" title="Muslim Girl Name Start With L" class="btn btn-md btn-lpink">L</a></td>
</tr>
<tr>
<td><a href="/girl-names-starting-with-m" title="Muslim Girl Name Start With M" class="btn btn-md btn-lpink">M</a></td>
<td><a href="/girl-names-starting-with-n" title="Muslim Girl Name Start With N" class="btn btn-md btn-lpink">N</a></td>
<td><a href="/girl-names-starting-with-o" title="Muslim Girl Name Start With O" class="btn btn-md btn-lpink">O</a></td>
<td><a href="/girl-names-starting-with-p" title="Muslim Girl Name Start With P" class="btn btn-md btn-lpink">P</a></td>
<td><a href="/girl-names-starting-with-q" title="Muslim Girl Name Start With Q" class="btn btn-md btn-lpink">Q</a></td>
<td><a href="/girl-names-starting-with-r" title="Muslim Girl Name Start With R" class="btn btn-md btn-lpink">R</a></td>
</tr>
<tr>
<td><a href="/girl-names-starting-with-s" title="Muslim Girl Name Start With S" class="btn btn-md btn-lpink">S</a></td>
<td><a href="/girl-names-starting-with-t" title="Muslim Girl Name Start With T" class="btn btn-md btn-lpink">T</a></td>
<td><a href="/girl-names-starting-with-u" title="Muslim Girl Name Start With Q" class="btn btn-md btn-lpink">U</a></td>
<td><a href="/girl-names-starting-with-v" title="Muslim Girl Name Start With V" class="btn btn-md btn-lpink">V</a></td>
<td><a href="/girl-names-starting-with-w" title="Muslim Girl Name Start With W" class="btn btn-md btn-lpink">W</a></td>
<td><a href="/girl-names-starting-with-x" title="Muslim Girl Name Start With X" class="btn btn-md btn-lpink">X</a></td>
</tr>
<tr>
<td></td>
<td></td>
<td><a href="/girl-names-starting-with-y" title="Muslim Girl Name Start With Y" class="btn btn-md btn-lpink">Y</a></td>
<td><a href="/girl-names-starting-with-z" title="Muslim Girl Name Start With Z" class="btn btn-md btn-lpink">Z</a></td>
<td></td>
<td></td>
</tr>
</table>
</div>
</div>
@endif
<!-- end letter menu -->
<!-- dua -->
<div class="card mb-3">
  <div class="card-header bg-boy"><i class="fas fa-praying-hands"></i> {{ $dua->name }}</div>
  <div class="card-body">
    <blockquote class="blockquote">
      {!! $dua->dua !!}
      <div class="blockquote-footer text-right">{{ $dua->sources }}</div>
      </blockquote>
    <p class="lead">{{ $dua->translation }}</p>
  </div>
  <div class="card-footer bg-girl"><a class="text-dark" href="{{ URL('/dua.php') }}">More Duas ...</a></div>
</div>
<!-- dua end -->
</div>
</div>
</div>
</div>
<div id="inbox">
<div class="" id="favCounter">
<div class="fa-2x">
  <a href="#" class="text-girl" id="pop">
    <span class="fa-layers fa-fw">
    <i class="fas fa-heart"></i>
    <span class="fa-layers-text fa-inverse count" data-fa-transform="shrink-11.5" style="font-weight:900">{{ $favCount }}</span></span></a>
</div>
</div>
</div>
</div>
<footer class="pt-2">
<div class="container">
<div class="row">
<div class="col-md-4">
<a class="text-muted" href="{{ url('/') }}">Home</a> | <a class="text-muted" href="{{ url('privacy.html') }}">Privacy & Policy</a> | <a class="text-muted" href="{{ url('contacts.html') }}">Contact Us</a>
</div>
<div class="col-md-8">
<p class="text-muted text-right">© Copyright &copy; <script>document.write(new Date().getFullYear())</script> Names4muslims.com</p>
</div>
</div>
</div>
</footer>
<div class="modal fade" id="searchForm" tabindex="-1" role="dialog" aria-labelledby="searchForm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-boy">
        <h5 class="modal-title" id="searchModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/search" method="GET">
      <div class="modal-body">

<div class="input-group">
<input name="q" type="text" class="form-control" aria-label="Please enter the name" placeholder="Search.." required>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-pink" aria-expanded="false">Search</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!-- Scripts -->
<script src="//cdn.names4muslims.com/assets/js/app.js"></script>
<script src="https://kit.fontawesome.com/e0ca5ae3cb.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e0ca5ae3cb.js" defer></script>
<script>
$(document).ready(function () {
 $('.content, .sidebar').theiaStickySidebar({
  // Settings
  additionalMarginTop: 80
 });
});

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-49358721-2', 'auto');
ga('send', 'pageview');

</script>
<script>
  $('#inbox').popover({
    html: true,
    placement: "left",
    content: function(){
        $.ajax({
            type: 'GET',
            url: '/get-favorites',
            cache: false,
        }).done(function(d){
            $('#favs-results').html(d);
        });

        return '<div id="favs-results">Loading...</div>';
        // Initially, the content() function returns a parent div,
        // which shows "Loading..." message.
        // As soon as the ajax call is complete, the parent div inside
        // the popover gets the ajax call's result.
    }
});
</script>
@include('sweetalert::alert')
@yield('scripts')
</body>
</html>
