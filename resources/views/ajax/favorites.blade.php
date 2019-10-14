<div class="p-3" style="height:150px; overflow-y: scroll">
<table class="table table-sm">
@foreach($names as $name)
<tr>
        <th scope="row">{{ $loop->iteration }}</th><td class="text-success">{{ $name->name }}</td><td>{{ $name->gender }}</td>
</tr>
@endforeach
</table>
<p class="text-center"><a href="/favorite-names.html">View All</a></p>
</div>