@extends('layouts.app_full_width')

@section('content')
<div id="fb-root"></div>
<script>(function (d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id))
return;
js = d.createElement(s);
js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=181189731942277";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@if ($agent->isMobile())
<div class="row no-gutters">
@else
<div class="row">
@endif
<div class="col-12 col-lg-8">
<div class="card">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/collection">Baby Names collection by Users</a></li>
<li class="breadcrumb-item active">{{ $data['title'] }}</li>                
</div>

<div class="card mb-3">
<div class="card-header">
  <div class="card-itle"><h3>{{ $data['title'] }}</h3></div>
  <p class="text-right">Created by {{ $data['author'] }}</p>
  </div>
<div class="card-body"> 
	@foreach($names as $name)

<div class ="row border mb-2 shadow-sm">
  <div class="col-1 vertical-align position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}"><a class="text-white stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a></div>
  <div class="col-11">
    <div class="row">
    <div class="col-12 pt-1 "><a class="name" href="{{ url('/name',$name->slug)}}.html">{{ $name->name }}</a></div>
    </div>
    <div class="row">
    <div class="col-10"><span class="font-weight-light {{ $name->gender === "Boy" ? "blue-link" : "text-girl" }}">{{ $name->gender }}</span></div>
    <div class="col-2 text-right" id="fav">
      @if (( Session::get('favorites')) && ($key = array_search($name->id, Session::get('favorites'))) !== false) 
      <span class="text-warning" title="Shortlisted"><i class="fas fa-star"></i></span>
      @else
      <span title="Add to Favorites" id="{{ $name->id }}" class="fav"><i class="far fa-star"></i></span>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-12"><p class="font-weight-light">{{ strip_tags($name->meaning) }}</p></div>
  </div>
  </div>  
</div>
@endforeach 
</div>       
<div class="card-footer text-center"><div class="addthis_inline_share_toolbox"></div> </div>
</div>

</div>

<div class="col-12 col-lg-4 sidebar">
<div class="theiaStickySidebar">
<div class="card mb-3">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
<div class="card">
<div class="card-header bg-blue"><h4>Comments</h4></div>
<div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-width="100%" data-mobile data-colorscheme="light" data-order-by="social"></div>
</div>
</div>
</div>
</div>
<!-- info modal -->
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
<!-- end of info -->
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
