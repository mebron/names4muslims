
<a href="/mypanel/names/show/{{$id}}" class="btn btn-xs btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i> View</a>
<a href="/mypanel/names/{{$id}}/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<form action="/mypanel/names/{{$id}}" method="post">{{  method_field('DELETE') }}{{ csrf_field() }} <button type="submit" class="btn btn-xs btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Del</button></form>