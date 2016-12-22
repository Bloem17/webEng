<!DOCTYPE html>
<html>
<head>
	<title>
		Teilnehmer
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
	<small>
           <button class='btn btn-primary' id="1" onclick="bearbeiten()">Bearbeiten
            </button>
        
    </small>
    <small>
	<button  class='btn btn-primary' id="1" type="button" onclick="load({{$id}},this.id)">Zurueck</button>
	</small>
</h1>

	<div class="form-group row">
		<label class="col-sm-1">ID:</label>
	    <label class="col-sm-3">{{$id}}</label>
	 	<label class="col-sm-1">Titel:</label>
		<label class="col-sm-3">{{$titel}}</label>
	 	<label class="col-sm-1">Datum:</label>
		<label class="col-sm-3">{{$datum}}</label>
	</div>

		<!-- 
			{{csrf_field()}} generate a token field which is send with the HTML request to validate it
			something something CSRF protection middelware
		-->

		<form method='post' action='{{$teilnehmer->id}}/update' id="req">

		{{ csrf_field() }}

		<div class="form-group row">
	      <label class="col-sm-2 col-form-label">Vorname</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="vorname" placeholder="Vorname" name="vorname" value="{{$teilnehmer->vorname}}" disabled>
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Nachname</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="nachname" placeholder="Nachmane" name="nachname" value="{{$teilnehmer->nachname}}" disabled>
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Strasse / Nr</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="strasse" placeholder="Strasse" name="strasse" value="{{$teilnehmer->strasse}}" disabled>
	      </div>
	      <div class="col-sm-2">
	    	  <input class="form-control" id="strNr" placeholder="Nr" name="strNr" value="{{$teilnehmer->strNr}}" disabled>
	      </div>
	    </div>

	    <div class="form-group row">
	      <label class="col-sm-2 col-form-label">Ort / PLZ</label>
	      <div class="col-sm-5">
	        <input class="form-control" id="ort" placeholder="Ort" name="ort" value="{{$teilnehmer->ort}}" disabled>
	      </div>
	      <div class="col-sm-2">
	    	  <input class="form-control" id="plz" placeholder="PLZ" name="plz" value="{{$teilnehmer->plz}}" disabled>
	      </div>
	    </div>

	    <div class="form-group">
			<button style="display:none;"  type='submit' id="addBtn" class='btn btn-success'>Teilnehmer hinzufügen</button>
		</div>

	</form>
</section>

</body>

<script type="text/javascript">

$( document ).ready(function() {
   setTimeout(function() {
	$('#msg').fadeOut();
	}, 10000 );
});

function bearbeiten(){

	document.getElementById('vorname').disabled = false;
	document.getElementById('nachname').disabled = false;
	document.getElementById('strasse').disabled = false;
	document.getElementById('strNr').disabled = false;
	document.getElementById('ort').disabled = false;
	document.getElementById('plz').disabled = false;
	document.getElementById('addBtn').style.display = 'block';
}

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