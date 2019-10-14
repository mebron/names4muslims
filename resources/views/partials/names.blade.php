
<div class="card-body">

@foreach($names as $name)

<div class ="row border mb-1 pt-1">
<div class="col-7 col-md-3"><h4><a href="{{ url('/name',$name->slug)}}.html">{{ $name->name }}</a></h4></div>
<div class="col-5 col-md-2 order-md-12 text-right">
    @if (Auth::check())                       
    <favorite
    :name={{ $name->id }}
    :favorited={{ $name->favorited() ? 'true' : 'false' }}
    :gender={{ ($name->gender == 'Boy') ?'true': 'false' }}
    ></favorite>
    @else
    <favoritetemp
    :name={{ $name->id }}
    :favorited={{ ( @$key = array_search($name->id, Session::get('favorites'))) ? 'true' : 'false' }}
    :gender={{ ($name->gender == 'Boy') ?'true': 'false' }}
    ></favoritetemp>
    @endif   
</div>
<div class="col-12 col-md-7"><span class="px-2 mr-2 float-left font-weight-light">{{ $name->gender }}</span> @if($agent->isMobile()) <small>Meaning:</small>  @endif<p class="font-weight-light">{{ strip_tags($name->meaning) }}</p></div>
</div>
@if($loop->index == 11)
<div class="row">
<div class="col-12">
<adsense
ad-client="ca-pub-9750369232662797"
ad-slot="6500451807"
ad-style="display: block"
ad-format="auto">
</adsense>
</div>
</div>
@endif
@endforeach
</div>
