<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload='setSelect()'>

<header>

@include ('static.nav')

</header>

@if(Session::has('message'))
	<p id="msg" class="{{Session::get('css')}}">{{ Session::get('message') }}</p>
@endif

<section class="container">
      
        <article class="jumbotrons">

<h1> Rechnung erfassen
    <small>
           <button class='btn btn-primary' id="1" onclick="bearbeiten()">Bearbeiten
            </button>
        
    </small>
</h1>

	<div class="form-group row">
		<label class="col-sm-1">ID:</label>
	    <label class="col-sm-1">{{$rechnung->reise_id}}</label>
	 	<label class="col-sm-1">Titel:</label>
		<label class="col-sm-3">{{$titel}}</label>

		
	</div>

<form method='post' action='{{$rechnung->id}}/update' id="req">

	<!-- 
		{{csrf_field()}} generate a token field which is send with the HTML request to validate it
		something something CSRF protection middelware
	-->
	{{ csrf_field() }}

	<div class="form-group row">
  		<label class="col-sm-2">Rechnungs-Nr</label>
  		<div class="col-sm-2">
        	<input id="rechnungsNr" class="form-control" placeholder="Rechnungs-Nr" name="rechnungsNr" value="{{$rechnung->rechnungsNr}}" disabled>
     	 </div>
    </div>

    <div class="form-group row">
  		<label class="col-sm-2">Betrag</label>
  		<div class="col-sm-2">
        	<input id="betrag" class="form-control" placeholder="Betrag" name="betrag" value="{{$rechnung->betrag}}" disabled>
     	 </div>
    </div>

    <div class="form-group row">
		<label for="" class="col-sm-2 col-form-label">Rechnungstyp</label>
 		<div class="col-sm-2">
 			<select class="custom-select" id='typ_select' name='selectRtyp' disabled>
			  	<option selected>Bestimmen Sie den Rechnungstyp</option>
			  	<option value="hotelrechnung">Hotelrechnung</option>
				<option value="reiseversicherung">Reiseversicherung</option>
				<option value="carkosten">Carkosten</option>
				<option value="essen">Essen</option>
				<option value="eventkosten">Eventkosten</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<button style="display:none;" type='submit' id="addBtn" class='btn btn-success'>Rechnung hinzufuegen</button>
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

function setSelect(){
	var rechnung = {!! json_encode($rechnung->toArray()) !!}
	document.getElementById('typ_select').value = rechnung.rechnungstyp;

	
}

function bearbeiten(){
	document.getElementById('rechnungsNr').disabled = false;
	document.getElementById('betrag').disabled = false;
	document.getElementById('typ_select').disabled = false;
	document.getElementById('addBtn').style.display = 'block';
}




document.getElementById("addBtn").onclick = function(){
	document.getElementById("addBtn").disabled = true;
	document.getElementById("req").submit();
	
}

 


</script>

</body>
</html>
