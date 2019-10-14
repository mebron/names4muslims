<!DOCTYPE html>
<html>
<head>
  <title>pusher</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div id="recent">
	<recentfavs></recentfavs>
</div>
<script src="{{ mix('/js/app.js')}}"></script>
</body>
</html>