@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header bg-dark text-white"><h2>Baby Names collection by Users</h2></div>
<div class="card-body">
<div class="row">
	@foreach($lists as $list)                   
	<div class="col-lg-8"><h2><a href="/collection/{{ $list->slug }}">{{ $list->title }}</a></h2></div><div class="col-lg-4"><strong> by {{ $list->users->name }}</strong></div>        
	@endforeach
</div>
</div>
</div>
</div>
</div>
@endsection