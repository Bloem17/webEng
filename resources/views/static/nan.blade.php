<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link href="/css/app.css" rel="stylesheet">
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
            @if (Auth::guest())
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
            @else
              <li><a href="{{ URL::to('/events') }}">View All Events</a></li>
              <li><a href="{{ URL::to('event/create') }}">Create a Event</a>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          </div>
        </nav>
</body>
</html>