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
<link href="//cdn.names4muslims.com/assets/css/app.css" rel="stylesheet">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" defer></script>
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
<link rel="dns-prefetch" href="//connect.facebook.net">
@yield('styles')
<!-- Scripts -->
<script>
window.Laravel = <?php
echo json_encode([
'csrfToken' => csrf_token(),
]);
?>
</script>
<style type="text/css">
.bg-grdgreen {
background: rgb(228,239,192); /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover, rgba(228,239,192,1) 0%, rgba(171,189,115,1) 100%); /* FF3.6-15 */
background: -webkit-radial-gradient(center, ellipse cover, rgba(228,239,192,1) 0%,rgba(171,189,115,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: radial-gradient(ellipse at center, rgba(228,239,192,1) 0%,rgba(171,189,115,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4efc0', endColorstr='#abbd73',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	}
  .link-pink { color: #ff99cc !important; }
</style>
</head>
<body>

<div id="app">
@if (!$agent->isMobile())
<header class="white-bg">
<div class="container">
<div class="row clearfix">
<div class="col-xs-12 col-sm-6 col-lg-6">
<div class="logo"><img src="//cdn.names4muslims.com/assets/img/logo.png" alt="Muslim Names" title="Muslim Names" class="img-fluid" /></div>
</div>
<div class="d-none d-sm-block col-sm-6 col-lg-6">
<h1 class="float-right text-info  main-title2">{{ Str::before(SEOMeta::getTitle('title'),'|') ?? 'Muslim Names and their Meaning' }}</h1>
</div>
</div>
</div>
</header>
@endif
@include('partials.main-menu')
<!-- /navbar -->

<div class="container pt-2">
@yield('content')
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
<footer class="pt-2 fixed-bottom">
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
</div>
<!-- Scripts -->
<script src="//cdn.names4muslims.com/assets/js/app.js"></script>
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
@yield('scripts')
@include('sweet::alert')
</body>
</html>
