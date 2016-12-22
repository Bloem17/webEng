<!DOCTYPE html>
<html>
<head>
	<title>
		Teilnehmer erfassen
	</title>
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

<h1>Teilnehmer erfassen
<button  class='btn btn-primary' id="1" type="button" onclick="load({{$event->id}},this.id)">Zurueck</button>
</h1>

	<div class="form-group row">
		<label class="col-sm-1">ID:</label>
	    <label class="col-sm-3">{{$event->id}}</label>
	 	<label class="col-sm-1">Titel:</label>
		<label class="col-sm-3">{{$event->titel}}</label>
	 	<label class="col-sm-1">Datum:</label>
		<label class="col-sm-3">{{$event->datum}}</label>
	</div>


	<form method='post' action='teilnehmer/store' id="req">

		<!-- 
			{{csrf_field()}} generate a token field which is send with the HTML request to validate it
			something something CSRF protection middelware
		-->
		{{ csrf_field() }}

		<div class="form-group row">
	      <label class="col-sm-2 col-form-label">Vorname</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="Vorname" name="vorname">
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Nachname</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="Nachmane" name="nachname">
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Strasse / Nr</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="Strasse" name="strasse">
	      </div>
	      <div class="col-sm-2">
	    	  <input class="form-control" id="" placeholder="Nr" name="strNr">
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Ort / PLZ</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="" placeholder="Ort" name="ort">
	      </div>
	      <div class="col-sm-2">
	    	  <input class="form-control" id="" placeholder="PLZ" name="plz">
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

function load (id, click_id){
	
	if (click_id == 1){

		var url = '{{(route("anzeigen", ":id"))}}'
	    url = url.replace(':id', id);
	    window.location.href = url;

	}
}

</script>
</html>