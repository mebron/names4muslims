@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-gradient-warning text-white">
        <h1>Baby Name Generator</h1>
        <p>The Name Generator can Suggest Beautiful Names For Your Newborn Baby</p>
    </div>
    <div class="card-body">
        @foreach($names as $name)
        <div class="row border mb-2 shadow-sm">
            <div
                class="col-1 vertical-align text-white position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
                <a class="text-dark stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a>
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-12 pt-1 "><a class="name"
                            href="{{ url('/name',$name->slug)}}.html">{{ $name->name }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10"><span
                            class="font-weight-light {{ $name->gender === "Boy" ? "blue-link" : "text-girl" }}">{{ $name->gender }}</span>
                    </div>
                    <div class="col-2 text-right" id="fav">
                        @if (( Session::get('favorites')) && ($key = array_search($name->id, Session::get('favorites')))
                        !==
                        false)
                        <span class="text-warning" title="Shortlisted"><i class="fas fa-star"></i></span>
                        @else
                        <span title="Add to Favorites" id="{{ $name->id }}"
                            class="{{ Auth::check() ? "myfav" : "fav" }}"><i class="far fa-star"></i></span>
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
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797"
                    data-ad-slot="9868081403" data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        @endif
        @endforeach
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4"><a href="/random-baby-names"
                        class="btn btn-block btn-success mb-2">Generate Names</a></div>
                <div class="col-md-4"><a href="/random-girl-names"
                        class="btn btn-block btn-pink mb-2">Generate Girl Names</a></div>
                <div class="col-md-4"><a href="/random-boy-names" class="btn btn-block btn-boy mb-2">Generate
                        Boy Names</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
