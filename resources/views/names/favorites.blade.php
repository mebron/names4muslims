@extends('layouts.app')

@section('content')

<div class="card">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- N4M RESPONSIVE -->
  <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797" data-ad-slot="9868081403"
    data-ad-format="auto"></ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>
<div class="card">
  <div class="card-header text-white" style="background-color: #C2D985;">
    <h2 class="text-xs-center">Favorite Names</h2>
  </div>
  <div class="card-body">
    @if(isset($names))
    @foreach($names as $name)

    <div class="row border mb-2 shadow-sm">
      <div class="col-2 col-md-1 vertical-align position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
        <a class="text-white stretched-link" href="{{ url('/name',$name->slug)}}.html">{{ $name->name[0] }}</a></div>
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
            <span title="Add to Favorites" id="{{ $name->id }}" class="{{ Auth::check() ? "myfav" : "fav" }}"><i
                class="far fa-star"></i></span>
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

    @else
    <div class="card offer offer-warning">
      <div class="card-body">Sorry, We are not found any names on your favorite list, please add some <a
          href="/most-popular-names.html">names</a> first!. Or <a href="/login" title="Log in to Names4Muslims.com">log
          in</a> to view your saved favorite names.</div>
    </div>
  @endif
  </div>
  </div>

  @if(Auth::check() AND count($names) > 9)
  <div class="alert alert-warning-alt" role="alert">Hello <strong>{{Auth::user()->name }}</strong>, wold you like to
    share your favorite list to public? <button class="btn btn-danger" data-toggle="modal" data-target="#myLists"><i
        class="fa fa-newspaper-o" aria-hidden="true"></i> Publish my lists</button></div>
  @endif
  <div class="card card-default">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 mb-3"><button class="btn btn-primary btn-block" data-toggle="modal"
            data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i> Email Favorites</button></div>
        <div class="col-md-4 mb-3">
          @if (Auth::check())
          <a class="btn btn-success btn-block" href="/favorite/download"><i class="fa fa-download"
              aria-hidden="true"></i> Download</a>
          @else
          <a href="#" class="btn btn-success btn-block" data-toggle="tooltip"
            title="You must logged in to download this names"><i class="fa fa-download" aria-hidden="true"></i>
            Download</a>
          @endif
        </div>

        <div class="col-md-4 mb-3"><button class="btn btn-info btn-block"><i class="fa fa-print" aria-hidden="true"></i>
            Print</button></div>
      </div>
    </div>
  </div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Email favorite names"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (Auth::check())
      <form action="/send-saved-names" method="post">
        @else
        <form action="/send-my-favorite-names" method="post">
          @endif
          {{ csrf_field() }}
          <div class="modal-body">

            <div class="form-group">
              <label for="toEmail">Email to:</label>
              <input name="to" type="email" class="form-control" id="toEmail" placeholder="Recepient Email" required="">
            </div>
            <div class="form-group">
              <label for="dubject">Subject:</label>
              <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" value="Muslim Baby Names" required="">
            </div>
            <div class="form-group">
              <label for="fromName">Your Name</label>
              <input name="name" type="text" class="form-control" id="fromName" placeholder="Your Name">
            </div>
            <div class="form-group">
              <label for="fromEmail">Your Email</label>
              <input name="from" type="email" class="form-control" id="fromEmail" placeholder="Your Email">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal2 -->
<div class="modal fade" id="myLists" tabindex="-1" role="dialog" aria-labelledby="Publish my lists" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My name list details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (Auth::check())
      <form action="/user/lists" method="post">
        @else
        <form action="/send-my-favorite-names" method="post">
          @endif
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Title of your lists:</label>
              <input name="title" type="text" class="form-control" id="title" placeholder="Title for your lists"
                required="">
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea name="description" class="form-control" id="description"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Publish</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- end model2 -->

@endsection
