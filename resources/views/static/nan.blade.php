<!DOCTYPE html>
<html>
<head>
  <title><link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"></title>
</head>
<body>

<header class="navbar navbar-inverse navbar-static-top">
        <nav class="container">
        <a href="{{ URL::to('/') }}" class="navbar-brand"> Travel GmbH </a>
        <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::to('/') }}">View All Events</a></li>
            <li><a href="{{ URL::to('event/create') }}">Create a Event</a>
            <li><a href="{{ URL::to('teilnehmer/create') }}">Teilnehmer hinuzfügen</a>
            <li><a href="{{ URL::to('teilnehmer/create') }}">Test hinuzfügen</a>
        </div>
      </nav>

</body>
</html>