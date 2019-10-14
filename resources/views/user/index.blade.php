@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="card card-default">
				<div class="card-header">{{ $user->name }}</div>
				<div class="card-body">
				<div class="row">

					<div class="col-md-4"><img src="/storage/users/avatar/{{ $user->avatar }}" class="img-thumbnail"></div>
					<div class="col-md-8">
					<form enctype="multipart/form-data" action="/user/profile" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="avatar">Update Profiloe Image</label>
							<input type="file" id="avatar" name="avatar" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">Save</button>
						</div>
					</form>
					</div>
					</div>
				</div>


			</div>
		</div>
		<div class="col-md-6">
			<div class="card card-default">
				<div class="card-heading">{{ $user->nickname }}</div>


			</div>
		</div>
	</div>
</div>
@endsection