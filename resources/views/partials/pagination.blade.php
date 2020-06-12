<div class="card-footer text-muted">
@if ($agent->isMobile())
	<div class="row justify-content-center">{{ $names->links('vendor.pagination.mobile') }}</div>
@else
	<div clas="row justify-content-center">{{ $names->links('vendor.pagination.bootstrap-4') }}</div>
@endif
</div>
