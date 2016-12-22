<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="hide()">

	<header>

    @include ('static.nav')
       
   </header>

   @if ($errors->any())

		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li style="list-style-type: none;">{{$error}}</li>
			@endforeach
		</ul>

	@endif
	
	<section class="container">
		<h1>Reise erfassen </h1>


		<form method='post' action='/event/store' id="req">

			<!-- 
				{{csrf_field()}} generate a token field which is send with the HTML request to validate it
				something something CSRF protection middelware
			-->
			{{ csrf_field() }}

			<div class="form-group row">
		      <label class="col-sm-1 col-form-label">Titel</label>
		      <div class="col-sm-5">
		        <input class="form-control" id="" placeholder="Titel" name="titel">
		      </div>
		    </div>

		    <div class="form-group row">
		 	 		<label for="" class="col-sm-1 col-form-label">Dauer</label>
		 	 		<div class="col-sm-10">
			 	 		<select class="custom-select" id='tage_select' onchange="changetextbox()" name="select">
						  <option value ="" selected>Dauer der Reise bestimmen!</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						</select>
					</div>
		    	</div>

			<h3>Kurzbeschrieb</h3>

			<div id='message'>
				Beschreiben sie die einzelnen Tage nachdem sie die Dauer der Reise bestimmt haben!
			</div>





			<div class="form-group row">
				<label for="" class="col-sm-1 col-form-label" id="1">Tag 1</label>
			    <div class="col-sm-5">
			    	<textarea class="form-control" rows="3" id="Tag 1" disabled name="tag1"></textarea>
			    </div>
			</div>

			<div class="form-group row">
				<label for="" class="col-sm-1 col-form-label" id="2">Tag 2</label>
			    <div class="col-sm-5">
			    	<textarea class="form-control" rows="3" id="Tag 2" disabled name="tag2"></textarea>
			    </div>
			</div>

			<div class="form-group row">
				<label for="" class="col-sm-1 col-form-label" id="3">Tag 3</label>
			    <div class="col-sm-5">
			    	<textarea class="form-control" rows="3" id="Tag 3" disabled name="tag3"></textarea>
			    </div>
			</div>

			<div class="form-group row">
		    	<label for="" class="col-sm-1 col-form-label" id="4">Tag 4</label>
		    	<div class="col-sm-5">
				    <textarea class="form-control" rows="3" id="Tag 4" disabled name="tag4"></textarea>
			    </div>
		  	</div>

			<div class="form-group row">
			    <label for="" class="col-sm-1 col-form-label" id="5">Tag 5</label>
			    <div class="col-sm-5">
				    <textarea class="form-control" rows="3" id="Tag 5" disabled name="tag5"></textarea>
			    </div>
		  	</div>
		 
		    <div class="form-group row">
			    <label for="" class="col-sm-1 col-form-label" id="6">Tag 6</label>
			    <div class="col-sm-5">
			    	<textarea class="form-control"rows="3" id="Tag 6" disabled name="tag6"></textarea>
			    </div>
		  	</div>

		   	<div class="form-group row">
			    <label for="" class="col-sm-1 col-form-label" id="7">Tag 7</label>
			    <div class="col-sm-5">
			    	<textarea class="form-control" rows="3" id="Tag 7" disabled name="tag7"></textarea>
			    </div>
		  	</div>


			<div class="form-group row">
		  		<label class="col-sm-1 col-form-label">Preis</label>
		  		<div class="col-sm-2">
		        	<input class="form-control" id="" placeholder="Preis" name="preis">
		     	 </div>
		      	<label class="col-sm-2 col-form-label">CHF</label>
		    </div>

		    <div class="form-group row">
		  		<label class="col-sm-1 col-form-label">Datum</label>
		  		<div class="col-sm-2">
		        	<input class="form-control" id="" placeholder="Datum" name="datum">
		     	</div>
		     	<label class="col-sm-1 text-muted">dd.mm.YYYY</label>
		    </div>

			<div class="form-group">
				<button id="addBtn" type='submit' class='btn btn-success'>Reise hinzufuegen</button>
			</div>

			




		</form>

	</section>

<script type="text/javascript">

document.getElementById("addBtn").onclick = function(){
	document.getElementById("addBtn").disabled = true;
	document.getElementById("req").submit();
	
}

 

function hide(){

	document.getElementById('message').style.display = 'block';

	for (var i = 1; i <= 7; i++){
		var string = "Tag " + i
		document.getElementById(string).style.display = 'none';
		document.getElementById(i).style.display = 'none';
	}


}


function changetextbox(){

	if(document.getElementById('tage_select').value == 'Dauer der Reise bestimmen!' ){
		document.getElementById('message').style.display = 'block';
	}else{
		document.getElementById('message').style.display = 'none';
	}

	

	var selected = document.getElementById('tage_select').value;
	for (var i = 1; i <= 7; i++){
		var string = "Tag " + i
		document.getElementById(string).disabled = true;
		document.getElementById(string).style.display = 'none';
		document.getElementById(i).style.display = 'none';
	}

	for (var i = 1; i <= selected; i++){
		var string = "Tag " + i
		document.getElementById(string).disabled = false;
		document.getElementById(string).style.display = 'block';
		document.getElementById(i).style.display = 'block';
	}
}

</script>

</body>
</html>