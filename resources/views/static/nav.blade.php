<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/css/app.css" rel="stylesheet">



			
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<a class="navbar-brand" href="/">Travel GmbH</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		@if (Auth::guest())
			<li><a href="{{ url('/about') }}">About</a></li>
		@else
	        <li><a href="{{ URL::to('/events') }}">Alle Reisen anzeigen</a></li>
	      	<li><a href="{{ URL::to('event/create') }}">Reise erfassen</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
	          <ul class="dropdown-menu">

	           @if (Auth::user()->isAdmin == "true")
                <li>
                    <a href="{{ url('/dashboard') }}" > Dashboard </a>
                </li>
                @endif
	          	<li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                </li>
               
                <li>
            		<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
	          </ul>
	        </li>
      	</ul>
      	@endif
	</nav>



</body>
</html>