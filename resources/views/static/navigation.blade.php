<!DOCTYPE html>
<html>
<head>
	<title><link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"></title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('/') }}">Event</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/') }}">View All Events</a></li>
        <li><a href="{{ URL::to('event/create') }}">Create a Event</a>
        <li><a href="{{ URL::to('teilnehmer/create') }}">Teilnehmer hinuzfügen</a>
    </ul>
</nav>

</body>
</html>

