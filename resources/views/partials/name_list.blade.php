<div id="fav">
<table class="table table-striped table-hover" id="favc">
<thead class="cf">
<tr>
    <th>Name</th>
    <th><a href="/favorite-names.html" alt="My Favorite List" title="My Favorite List"><i class="fa fa-heart" aria-hidden="true"></i></a></th>
    <th>Meaning</th>    
</tr>
</thead>
@foreach($names as $name)
<tr>
<td class="pl-0 pr-0"><a href="{{ url('/name',$name->slug)}}.html" class="btn m-0 m-0 pr-0 {{ ($name->gender ==='Boy') ? 'text-primary' : 'text-pink' }}" alt="Muslim {{ $name->gender }} Name: {{ $name->name }}" title="More about {{ $name->name }}">{{ $name->name }} <i class="{{ ($name->gender ==='Boy') ? 'fa fa-mars' : 'fa fa-venus' }}" aria-hidden="true"></i></a></td>
<td>
    @if (Auth::check())                       
    <favoritelist
    :name={{ $name->id }}
    :favorited={{ $name->favorited() ? 'true' : 'false' }}
    :gender={{ ($name->gender == 'Boy') ?'true': 'false' }}
    ></favoritelist>
    @else
    <favoriteguest
    :name={{ $name->id }}
    :favorited={{ ( @$key = array_search($name->id, Session::get('favorites'))) ? 'true' : 'false' }}
    :gender={{ ($name->gender == 'Boy') ?'true': 'false' }}
    ></favoriteguest>
    @endif  
</td>
<td>{{ strip_tags($name->meaning) }}</td>

</tr>
@if($loop->index == 11)
<tr><td colspan="3" style="padding:0px;">
<adsense
ad-client="ca-pub-9750369232662797"
ad-slot="6500451807"
ad-style="display: block"
ad-format="auto">
</adsense>
</td>
@endif
@endforeach
</table>
</div>