<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

</head>
<body onload="hide()">

<header>

@include ('static.nav')

</header>

<section class="container">
      
        <article class="jumbotrons">

<h1>Rechnung erfassen</h1>

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
			  	<option selected>Bestimmen Sie den Rechnungstyp</option>
			  	<option value="hotelrechnung">Hotelrechnung</option>
				<option value="ov">Oeffentliche Verkehrsmittel</option>
				<option value="test">test</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<button type='submit' id="addBtn" class='btn btn-primary'>Add Rechnung</button>
	</div>

</form>

</article>

</section>

<script type="text/javascript">


document.getElementById("addBtn").onclick = function(){
	document.getElementById("addBtn").disabled = true;
	document.getElementById("req").submit();
	
}

 


</script>

</body>
</html>