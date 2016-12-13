<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
  <script src="js/sweetalert.min.js"></script>
</head>
<body>

<header class="navbar navbar-inverse navbar-static-top">
        <nav class="container">
          <a href="{{ URL::to('/') }}" class="navbar-brand"> Travel GmbH </a>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
              <li><a href="{{ url('/about') }}">About</a></li>
            @else
              <li><a href="{{ URL::to('/events') }}">View All Events</a></li>
              <li><a href="{{ URL::to('event/create') }}">Create a Event</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                  </li>
                  <li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
        </nav>

</body>
</html>