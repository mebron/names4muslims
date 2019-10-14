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
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
<div class="fab btn-group show-on-hover dropup">
<div data-toggle="tooltip" data-placement="left" title="My Favorites" style="margin-left: 42px;">
<button type="button" class="btn btn-primary btn-io dropdown-toggle align-middle" data-toggle="dropdown">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x fab-backdrop"></i>
<i class="fa fa-heart fa-stack-1x fa-inverse fab-primary"></i>
<i class="fa fa-heart-o fa-stack-1x fa-inverse fab-secondary"></i>
<span class="count fa fa-stack-1x" style="font-size:11px;color:#000;">{{ $favCount }}</span>
</span>
</button></div>
<ul class="dropdown-menu dropdown-menu-right" role="menu">
<li><a href="/baby-boys.php" data-toggle="tooltip" data-placement="left" title="MuslimBoyNames"><i class="fa fa-mars" aria-hidden="true"></i></a></li>
<li><a href="/baby-girls.php" data-toggle="tooltip" data-placement="left" title="MuslimGirlNames"><i class="fa fa-venus" aria-hidden="true"></i></a></li>
<li><a href="/favorite-names.html" data-toggle="tooltip" data-placement="left" title="MyFavorites"><i class="fa fa-star-o"></i></a></li>
<li><a href="/" data-toggle="tooltip" data-placement="left" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
<footer class="footer mt-3 fixed-bottom">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-5 col-md-5 col-md-push-7"><p class="text-muted"><a class="text-muted" href="http://www.names4muslims.com/">Home</a> | <a class="text-muted" href="{{ URL('/privacy.html') }}">Privacy & Policy</a> | <a class="text-muted" href="{{ URL('/contacts.html')}}">Contact Us</a> </p></div>
<div class="col-xs-12 col-sm-7 col-md-7 col-md-pull-5"><p class="text-left text-muted">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Names4muslims.com and www.muslim-names.net. Site by <a class="text-muted" href="http://mebron.com" title="Website by">Mebron</a><br></p></div>

</div>
</div>
</footer>
<div class="modal fade" id="searchForm" tabindex="-1" role="dialog" aria-labelledby="searchForm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
        <button type="submit" class="btn btn-primary" aria-expanded="false">Search</button>
      </div>
  </form>
    </div>
  </div>
</div>
</div>
<!-- Scripts -->
<script src="//cdn.names4muslims.com/assets/js/app.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
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
