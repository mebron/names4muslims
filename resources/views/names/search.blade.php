@extends('layouts.app')

@section('content')

<div class="card">
  <!-- n4m-search-to -->
  <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797" data-ad-slot="5209969408"
    data-ad-format="auto"></ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>

<div class="card">
  <div class="card-header text-white" style="background-color: #C2D985;">
    <h2 class="text-center">Muslim Names Search Results</h2>
  </div>
  <div class="card-body">
    <div class="infinite-scroll">

      @foreach($names as $name)

      <div class="row border mb-2 shadow-sm">
        <div
          class="col-1 vertical-align text-white position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
          <a class="text-dark stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a></div>
        <div class="col-11">
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
              <span title="Add to Favorites" id="{{ $name->id }}" class="{{ Auth::check() ? "myfav" : "fav" }}"><i class="far fa-star"></i></span>
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

      <div class="col-12 text-center mt-3">
        @if ($names->hasMorePages())
        <!-- added 'appends(Request::except('page'))->' for search result pagination -->
        <a title="Load more names" class="btn btn-outline-secondary loadMore"
          href="{{ $names->appends(Request::except('page'))->nextPageUrl() }}" rel="next">Load More</a>
        @else
        <a class="disabled">End</span></a>
        @endif
      </div>
    </div>

  </div>
</div>

@endsection
@section('scripts')
<script>

$('ul.paginationd').hide();
$(function () {
 $('.infinite-scroll').jscroll({
  autoTrigger: false,
  loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
  padding: 0,
  nextSelector: '.loadMore',
  contentSelector: 'div.infinite-scroll',
  callback: function () {
   $('ul.pagination').remove();
  }
 });
});
</script>
@endsection
