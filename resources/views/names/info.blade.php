@extends('layouts.info')
@section('styles')
<link rel="stylesheet" href="{{ URL::asset('/css/lightbox.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/css/starrr.css') }}">
@endsection
@section('content')
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=181189731942277';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::previous() }}">back</a></li>
    <li class="breadcrumb-item active">Baby Name: {{ $names->name }}</li>
</ol>
@if ($agent->isMobile())
<div class="row no-gutters">
@else
<div class="row">
@endif
    <div class="col-md-7">
        <div class="card">
            <div class="card-header text-white">
                <span class="text-center">
                    <h2 class="{{ ($names->gender ==='Boy') ? 'text-primary' : 'text-danger' }} display-4">{{ $names->name }}</h2>
                </span>
            </div>

            <div class="card-body">
                <div class="col-12 text-warning text-center">
                    <div id="" class="starrr display-4" data-rating='{{ @$names->ratings->average }}' data-id="{{ $names->id }}"></div>
                    <span class="badge badge-success"> from {{ @$names->ratings->total_votes }} votes</span>
                </div>
                <p class="text-center">{{ $names->name }} is a Muslim {{ $names->gender }} given Name</p>
                <div>
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><strong>{{ $names->name }}</strong></td>
                            </tr>
                            <tr>
                                <td>Arabic</td>
                                <td><h2 class="float-right text-success m-0 p-0">{{ $names->arabic ?? '' }}</h2></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $names->gender }}</td>
                            </tr>
                            <tr>
                                <td>Meaning</td>
                                <td>{{ strip_tags($names->meaning) }}</td>
                            </tr>
                            <tr>
                                <td>Origin</td>
                                <td>{{ $names->origin ?? 'Not available' }}</td>
                            </tr>
                            <tr>
                                <td>Verified</td>
                                <td>@if ($names->verified === 1)
                                    <span class="text-success" title="Verified by Names4Muslims"><i
                                            class="fa fa-check-square-o" aria-hidden="true"></i></span>
                                    @else
                                    <span class="text-warning"><i class="fa fa-exclamation-triangle"
                                            aria-hidden="true"></i></span>
                                    @if( Auth::id() ==1)
                                    <div> <a href="/admin/verify/{{ $names->id }}">Verify</a></div>
                                    @endif
                                    @endif</td>
                            </tr>
                            <tr>
                                <td>Alternate Spelling</td>
                                <td>{!! $names->alternate ?? 'Not available' !!}</td>
                            </tr>
                            <tr>
                                <td>Add to favorites</td>
                                <td>
                                    <div id="fav">
                                        @if (( Session::get('favorites')) && ($key = array_search($names->id, Session::get('favorites'))) !== false)
                                        <h2 class="text-warning" title="Shortlisted"><i
                                                class="fas fa-star"></i></h2>
                                        @else
                                        <h2 title="Add to Favorites" id="{{ $names->id }}"
                                            class="{{ Auth::check() ? "myfav" : "fav" }}"><i
                                                class="far fa-star"></i></h2>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if( Auth::id() ==1)
                    <div><a href="/admin/names/{{ $names->id }}/edit">Edit</a></div>
                    @endif
                    @if (Auth::check())
                    <div><a href="/add-name-faces/{{ $names->id }}"><i class="fa fa-camera" aria-hidden="true"></i> Add
                            faces for this name</a></div>
                    @endif
                    <div class="card-columns">
                        @if (count($names->galleries) > 1)
                        <h5>Faces with this name</h5>
                        @endif
                        @foreach($names->galleries as $face)
                        <div class="card">
                            <div class="card-body"><a href="/storage/photos/full/{{ $face->image }}"
                                    data-lightbox="{{ $face->name }}" class="zoom" data-title="{{ $face->description }}"
                                    data-type="image" data-toggle="lightbox"><img
                                        src="/storage/photos/thumbnails/{{ $face->image }}" class="img-thumbnail"></a>
                            </div>
                            <div class="card-footer text-muted"><small>{{ $face->name }}</small></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('partials.3links')
    </div>
    <div class="col-md-5">
        <div class="card mb-3">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- N4M RESPONSIVE -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797"
                data-ad-slot="9868081403" data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        @if(count($names->translations))
        <div class="card text-white bg-secondary mb-3">
            <div class="card-body">

                <table>
                    <tr>
                        <th colspan="2">How to write {{ $names->name }} in other languages</th>
                    </tr>
                    @foreach($names->translations as $language)
                    <tr>
                        <td>{{ $language->language }}</td>
                        <td>{{ $language->name }}</td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>
        @endif
        <div class="card text-white bg-light-green mb-3">
            <div class="card-body">

                @foreach($names->details as $detail)
                <h3>{{ $detail->title }}</h3>
                <p>{!! $detail->content !!}</p>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-blue">
                <h4>Comments</h4>
            </div>
            <div class="fb-comments" data-href="http://www.names4muslims.com/name/{{ $names->slug }}.html"
                data-numposts="5" data-width="100%" data-mobile data-colorscheme="light"></div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/lightbox.min.js')}}"></script>
<script src="{{ URL::asset('/js/starrr.js')}}"></script>
@endsection
