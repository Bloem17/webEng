<!DOCTYPE html>
<html>
<head>
	<title></title>


</head>
<body onload="hide()">

<header>

@include ('static.nav')

</header>

@if(Session::has('message'))
	<p id="msg" class="{{ Session::get('css') }}" >{{ Session::get('message') }}</p>
@endif

@if ($errors->any())

				<ul class="alert alert-danger">

					@foreach ($errors->all() as $error)
					<li style="list-style-type: none;">{{$error}}</li>
					@endforeach
				</ul>

	@endif

<section class="container">


      
        <article class="jumbotrons">

<h1>Rechnung erfassen
<button  class='btn btn-primary' id="1" type="button" onclick="load({{$event->id}},this.id)">Zurueck</button></h1>

<div class="form-group row">
	<label class="col-sm-2">Ausgewaehlter Event:</label>
</div>

	<div class="form-group row">
		<label class="col-sm-1">ID:</label>
	    <label class="col-sm-1">{{$event->id}}</label>
	 	<label class="col-sm-1">Titel:</label>
		<label class="col-sm-3">{{$event->titel}}</label>
		
	</div>

<form method='post' action='rechnung/store' id="req">

	<!-- 
		{{csrf_field()}} generate a token field which is send with the HTML request to validate it
		something something CSRF protection middelware
	-->
	{{ csrf_field() }}

	<div class="form-group row">
  		<label class="col-sm-2">Rechnungs-Nr</label>
  		<div class="col-sm-2">
        	<input class="form-control" placeholder="Rechnungs-Nr" name="rechnungsNr">
     	 </div>
    </div>

    <div class="form-group row">
  		<label class="col-sm-2">Betrag</label>
  		<div class="col-sm-2">
        	<input class="form-control" placeholder="Betrag" name="betrag">
     	 </div>
    </div>

    <div class="form-group row">
		<label for="" class="col-sm-2 col-form-label">Rechnungstyp</label>
 		<div class="col-sm-2">
 			<select class="custom-select" id='tage_select' name="selectRtyp">
			  	<option selected value="">Bestimmen Sie den Rechnungstyp</option>
			  	<option value="Hotelrechnung">Hotelrechnung</option>
				<option value="Reiseversicherung">Reiseversicherung</option>
				<option value="Carkosten">Carkosten</option>
				<option value="Essen">Essen</option>
				<option value="Eventkosten">Eventkosten</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<button type='submit' id="addBtn" class='btn btn-success'>Rechnung hinzufuegen</button>
	</div>

</form>

</article>

</section>

<script type="text/javascript">

$( document ).ready(function() {
   setTimeout(function() {
	$('#msg').fadeOut();
	}, 3000 );
});


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

</body>
</html>