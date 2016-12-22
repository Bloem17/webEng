<!DOCTYPE html>
<html>
<head>
	<title>Benutzer hinzufuegen</title>
</head>
<body>

<header>
 	@include ('static.nav')
</header>

@if(Session::has('message'))
	<p class="{{ Session::get('css') }}" >{{ Session::get('message') }}</p>
@endif

@if ($errors->any())

	<ul class="alert alert-danger">

		@foreach ($errors->all() as $error)
		<li style="list-style-type: none;">{{$error}}</li>
		@endforeach
	</ul>

	@endif



<section class="container">

<h1>Benutzer erfassen</h1>

	<form method='post' action='store' id="req">

		<!-- 
			{{csrf_field()}} generate a token field which is send with the HTML request to validate it
			something something CSRF protection middelware
		-->
		{{ csrf_field() }}

		<div class="form-group row">
	      <label class="col-sm-2 col-form-label">Benutzername</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="benutzername" name="name">
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">E-Mail</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="email" name="email">
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Passwort</label>
	      <div class="col-sm-5">
	        <input type="password" class="form-control" id="" placeholder="passwort" name="passwort">
	      </div>
	      <ul class="col-sm-4 text-muted">
	      <li >Minimale Länge: 8 Zeichen</li>
	      <li>Mindestens ein Grossbuchstaben</li>
	      <li>Mindestens eine Ziffer</li>
	      </ul>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Passwort wiederholen</label>
	      <div class="col-sm-5">
	        <input type="password" class="form-control" id="" placeholder="passwort wiederholen" name="passwort1">
	      </div>
	    </div>

		<div class="form-group row">
		 <label class="col-sm-2 col-form-label">Admin</label>
		 <div class="col-sm-5">
	      <input type="checkbox" name="admin" value="true"> <br>.
	      </div>
	    </div>

	    <div class="form-group">
			<button type='submit' id="addBtn" class='btn btn-success'>Teilnehmer hinzufügen</button>
		</div>

	</form>
</section>

</body>

<script type="text/javascript">

document.getElementById("addBtn").onclick = function(){
	document.getElementById("addBtn").disabled = true;
	document.getElementById("req").submit();
	
}
</script>

</html>