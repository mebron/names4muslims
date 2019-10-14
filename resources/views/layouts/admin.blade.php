<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mypanel</title>
    <link href="{{ URL::asset('/css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div id="app" class="container-fluid">
      <div class="row">
        <div  class="col-md-2 bg-dark">
        <nav class="sidebar mt-3">
          <ul class="nav flex-column nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mypanel/names/"><i class="fa fa-table"></i> Names</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mypanel/details">Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mypanel/users">Users</a>
            </li>
          </ul>
        </nav>
      </div>
        <div class="col-md-10 pt-3">
         @yield('content')
        </div>
      </div>
    </div>
    <script src="{{ mix('/js/admin.js')}}"></script>
    <script src="https://use.fontawesome.com/266efcd832.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    @stack('scripts')
    @include('sweet::alert')
  </body>
</html>
