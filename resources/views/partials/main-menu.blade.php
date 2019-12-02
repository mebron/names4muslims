<nav class="navbar sticky-top navbar-expand-lg navbar-light p-0 mb-3" style="font-size: 1.1em; background-color: #E3F2FD !important; border: 1px solid #BBDEFB !important;">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}"> <span class="d-lg-none">Names4Muslims.com</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item {{ Request::is('muslim-girl-names') ? 'active' : '' }}">
    <a class="nav-link" href="/muslim-girl-names">Muslim Girl Names</a>
</li>
<li class="nav-item {{ Request::is('/muslim-boy-names') ? 'active' : '' }}">
    <a class="nav-link" href="/muslim-boy-names">Muslim Boy Names</a>
</li>
<li class="nav-item {{ Request::is('/most-popular-names') ? 'active' : '' }}">
    <a class="nav-link" href="/most-popular-names">Most Popular Names</a>
</li>
<li class="nav-item {{ Request::is('favorite-names.html') ? 'active' : '' }}">
    <a class="nav-link" href="/favorite-names.html">Favorite Names</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ Request::is('collection') ? 'active' : '' }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Collection</a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Request::is('collection') ? 'active' : '' }}" href="/collection">By Users</a>
	</div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More...</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="/baby-names">Muslim Names</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/most-favorited-muslim-baby-names">Most Favorited Names</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/boy-names-by-letter.html">Boy Names by Letter</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/girl-names-by-letter.html">Girl Names by Letter</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/random-baby-names">Random Names</a>
        <a class="dropdown-item" href="/random-boy-names">Random Boy Names</a>
        <a class="dropdown-item" href="/random-girl-names">Random Girl Names</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/asma-ul-husna">Asmaul Husna</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/dua.php">Islamic Dua</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/short-muslim-baby-names">Short Names</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/three-letter-boy-names">Three Letter Boy Names</a>
        <a class="dropdown-item" href="/three-letter-girl-names">Three Letter Girl Names</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/four-letter-boy-names">Four Letter Boy Names</a>
        <a class="dropdown-item" href="/four-letter-girl-names">Four Letter Girl Names</a>
        <div class="dropdown-divider bg-success"></div>
        <a class="dropdown-item" href="/five-letter-boy-names">Five Letter Boy Names</a>
        <a class="dropdown-item" href="/five-letter-girl-names">Five Letter Girl Names</a>
        <div class="dropdown-divider bg-success"></div>
    </div>
</li>
</ul>
<!-- Right Side Of Navbar -->
<ul class="nav justify-content-end">
<li class="nav-item"><a class="btn btn-success" data-toggle="modal" data-target="#searchForm"> <i class="fa fa-search" aria-hidden="true"></i></a></li>
<!-- Authentication Links -->
@if (Auth::guest())
<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
<li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
@else
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu">

        <a class="dropdown-item" href="/logout"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>
</li>
@endif
</ul>
</div>
</div>
</nav> <!-- /navbar -->
