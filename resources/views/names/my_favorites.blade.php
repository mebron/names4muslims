@extends('layouts.app')

@section('content')
    <div class="card"  style="background-color: #b3f5e8">
    <div class="card-header card-inverse bg-success"><h2 class="text-xs-center">My Saved Names</h2></div>

      <div class="card-body"  style="min-height:500px;">
        
          @foreach($names as $name)
          <div class="row border mb-2 shadow-sm">
            <div class="col-1 vertical-align position-relative {{ $name->gender === "Boy" ? "bg-boy" : "bg-girl" }}">
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
              <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9750369232662797" data-ad-slot="9868081403"
                data-ad-format="auto"></ins>
              <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </div>
          </div>
          @endif
          @endforeach
          <hr>
          <div class="row">                
            <div class="col-md-4"><button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i> Email Favorites</button></div>
            <div class="col-md-4"><a class="btn btn-info btn-block" href="/favorite/download"><i class="fa fa-download" aria-hidden="true"></i> Download</a></div>
            <div class="col-md-4"></div>
          </div>
        
        <!-- What are you looking :) -->                   
      </div>
    </div> 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Email my saved names" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/send-saved-names" method="post">
        {{ csrf_field() }}
        <div class="modal-body">

          <div class="form-group">
            <label for="toEmail">Email to:</label>
            <input name="to" type="email" class="form-control" id="toEmail" placeholder="Recepient Email" required="">
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
@endsection
