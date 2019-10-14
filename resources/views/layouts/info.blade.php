<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEO::generate() !!}
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="fb:app_id" content="{181189731942277}" />
<link rel="shortcut icon" href="//cdn.names4muslims.com/assets/ico/favicon.png">
<link rel="apple-touch-icon" href="//cdn.names4muslims.com/assets/ico/apple-touch-icon-144-precomposed.png"/>
<!-- Styles -->
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
<h1 class="float-right text-info  main-title2">{{ Str::before(SEOMeta::getTitle('title'),'|') ?? 'Muslim Names and Meaning' }}</h1>
</div>
</div>
</div>
</header>
@endif
@include('partials.main-menu')
<!-- /navbar -->
@if ($agent->isMobile())
<div class="container-fluid px-1">
  @else
  <div class="container pt-2">
    @endif
@yield('content')
</div>
<div id="inbox">
<div class="" id="favCounter">
<div class="fa-3x">
<a href="#" id="pop"><span class="fa-layers fa-fw"><i class="fas fa-heart text-success"></i><span class="fa-layers-counter" data-fa-transform="shrink-11.5"><favcounter></favcounter></span></span></a>
</div>
</div>
</div>
<footer class="footer mt-3">
<div class="container">
<div class="row p-3">
<div class="col-xs-12 col-sm-5 col-md-5 col-md-push-7 text-muted"><a href="https://www.names4muslims.com/">Home</a> | <a href="{{ URL('/privacy.html') }}">Privacy & Policy</a> | <a href="{{ URL('/contacts.html')}}">Contact Us</a></div>
<div class="col-xs-12 col-sm-7 col-md-7 col-md-pull-5 text-muted">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Names4muslims.com and www.muslim-names.net. Site by <a class="text-muted" href="http://mebron.com" title="Website by">Mebron</a></div>

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
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://use.fontawesome.com/723865a7d5.js"></script>
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
  $('#pop').popover({
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
@yield('scripts')
@include('sweet::alert')
</body>
</html>
