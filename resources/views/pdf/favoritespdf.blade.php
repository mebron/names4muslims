<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Names4Muslims.com</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           
    <!-- Scripts -->
</head>
<body>
<table class="table w-100 table-borderless">
    <tr>
        <td scope="col"><img src="{{ URL::asset('img/logo.png') }}" alt="Muslim Names" title="Muslim Names" /></td>
        <td scope="col"><h4 class="text-right"><a href="https://www.names4muslims.com">Muslim Baby Names</a></h4>And Their Meaning</td>
    </tr>
</table>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Meaning</th>                                        
        </tr>
    </thead>
    <tbody>      
    @foreach($names as $name)
    <tr>
        <td><a href="{{ url('/baby-names',$name->slug)}}.html">{{ $name->name }}</a></td><td>{{ $name->gender }}</td><td>{{ strip_tags($name->meaning) }}</td>
    </tr>
    @endforeach
    </tbody>                            
</table>
<br>
<p>Find more muslim baby names please visit : <a href="http://wwww.names4muslims.com">www.names4muslims.com</a></p>

</body>
</html>
