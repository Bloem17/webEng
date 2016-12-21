<!DOCTYPE html>
<html>
<head>
	<title></title>	

</head>
<body onload='getValue({{$event->dauer}})'>

<header>
	 @include ('static.nav')
</header>

@if(Session::has('message'))
	<p id="msg" class="{{Session::get('css')}}">{{ Session::get('message') }}</p>
@endif

@if ($errors->any())

		<ul class="alert alert-danger">

			@foreach ($errors->all() as $error)
				<li style="list-style-type: none;">{{$error}}</li>
			@endforeach
		</ul>
	@endif



<section class="container">

<form method='post' action='{{$event->id}}/update' id="req">

	<div class="form-group row">

		<h1><lable class="col-sm-3">Reise anzeigen</lable>
		<button class='btn btn-primary' id="changeBtn" onclick="bearbeiten()" type="button">Bearbeiten</button>
		<button style="display:none;" class='btn btn-success' id="saveBtn" type="submit">speichern</button>
		</h1>

	</div>

	<!-- 
		{{csrf_field()}} generate a token field which is send with the HTML request to validate it
		something something CSRF protection middelware
	-->
	{{ csrf_field() }}

	<div class="form-group row">
	  <label class="col-sm-1 col-form-label">Event-ID</label>
	  <div class="col-sm-10">
	    <input class="form-control" disabled value="{{$event->id}}" name="titel">
	  </div>
	</div>

	<div class="form-group row">
	  <label class="col-sm-1 col-form-label">Titel</label>
	  <div class="col-sm-10">
	    <input class="form-control" id="titel" disabled value="{{$event->titel}}" name="titel">
	  </div>
	</div>

	<div class="form-group row">
		 		<label for="" class="col-sm-1 col-form-label">Dauer</label>
		 		<div class="col-sm-10">
	 	 		<select class="custom-select" id='tage_select' disabled name="select" onchange="changetextbox()" >
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
				  <option value="7">7</option>
				</select>
			</div>
		</div>

	<h3>Kurzbeschrieb</h3>

	<div class="form-group row">
		<label for="" class="col-sm-1 col-form-label" id="1">Tag 1</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" rows="3" id="Tag 1" disabled name="tag1">{{$event->tag1}}</textarea>
	    </div>
	</div>

	<div class="form-group row">
		<label for="" class="col-sm-1 col-form-label" id="2">Tag 2</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" rows="3" id="Tag 2" disabled name="tag2">{{$event->tag2}}</textarea>
	    </div>
	</div>

	<div class="form-group row">
		<label for="" class="col-sm-1 col-form-label" id="3">Tag 3</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" rows="3" id="Tag 3" disabled name="tag3">{{$event->tag3}}</textarea>
	    </div>
	</div>

	<div class="form-group row">
		<label for="" class="col-sm-1 col-form-label" id="4">Tag 4</label>
		<div class="col-sm-10">
		    <textarea class="form-control" rows="3" id="Tag 4" disabled name="tag4">{{$event->tag4}}</textarea>
	    </div>
		</div>

	<div class="form-group row">
	    <label for="" class="col-sm-1 col-form-label" id="5">Tag 5</label>
	    <div class="col-sm-10">
		    <textarea class="form-control" rows="3" id="Tag 5" disabled name="tag5">{{$event->tag5}}</textarea>
	    </div>
		</div>

	<div class="form-group row">
	    <label for="" class="col-sm-1 col-form-label" id="6">Tag 6</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control"rows="3" id="Tag 6" disabled name="tag6">{{$event->tag6}}</textarea>
	    </div>
		</div>

		<div class="form-group row">
	    <label for="" class="col-sm-1 col-form-label" id="7">Tag 7</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" rows="3" id="Tag 7" disabled name="tag7">{{$event->tag7}}</textarea>
	    </div>
		</div>


	<div class="form-group row">
			<label class="col-sm-1 col-form-label">Preis</label>
			<div class="col-sm-2">
	    		<input class="form-control" id="preis" disabled name="preis" value="{{$event->preis}}"></input>
	 	 	</div>
	  		<label class="col-sm-2 col-form-label">CHF</label>
	</div>

	<div class="form-group row">
  		<label class="col-sm-1 col-form-label">Datum</label>
  		<div class="col-sm-2">
        	<input class="form-control" id="datum" placeholder="Datum" name="datum" value="{{$event->datum}}" disabled>
     	 </div>
    </div>
    </form>

	<div class="form-group row">
		
		<h1 ><lable class="col-sm-3">Rechnungen</lable>
			<div class="col-sm-3 "> 
				<button class='btn btn-primary' id="1" onclick="load( {{$event->id}}, this.id)" type="button">Rechnung hinzufuegen</button>
			</div>
			<div class="col-md-6 text-right">
				<button class='btn btn-warning ' id="3" onclick="load(this.id)" type="button">Details</button>
				<button class='btn btn-danger ' id="4" onclick="load(this.id)" type="button">Loeschen</button>
			</div>
		</h1>
	</div>

	<div class="form-group row">
	

		<table id="tableRech" class="table table-striped table-bordered">

			<thead>
			    <tr >
			        <td>ID</td>
			        <td>Rechnungs-Nr</td>
			        <td>Betrag</td>
			        <td>Rechnungstyp</td>
			        <td>Reise-ID</td>
			    </tr>
			</thead>

			@foreach ($rechnungen as $rechnung)
			<tbody>
					<tr id="rech" onclick='pick({{ $rechnung->id }}, this, this.id)'>
						<td>{{ $rechnung->id }}</td>
						<td>{{ $rechnung->rechnungsNr }}</td>
						<td>{{ $rechnung->betrag }}</td>
						<td>{{ $rechnung->rechnungstyp }}</td>
						<td>{{ $rechnung->reise_id }}</td>
					</tr>
				</tbody>
			@endforeach
		</table>
		<section class ="container">
    		{{$rechnungen->appends(['teilnehmer' => $teilnehmer->currentPage()])->links()}}    
		</section>
	</div>


	<div class="form-group row">
		
		<h1 ><lable class="col-sm-3">Teilnehmer</lable>
			<div class="col-sm-3 "> 
				<button class='btn btn-primary' id="2" onclick="load( {{$event->id}}, this.id)" type="button">Teilnehmer hinzufuegen</button>
			</div>
			<div class="col-md-6 text-right">
				<button class='btn btn-warning ' id="5" onclick="load(this.id)" type="button">Details</button>
				<button class='btn btn-danger ' id="6" onclick="load(this.id)" type="button">Loeschen</button>
			</div>
		</h1>
	</div>



	<div class="form-group row">
		<table id="table" class="table table-striped table-bordered">

			<thead>
			    <tr >
			        <td>ID</td>
			        <td>Vorname</td>
			        <td>Nachname</td>
			        <td>Strasse</td>
			        <td>Nr</td>
			        <td>PLZ</td>
			        <td>Ort</td>
			        <td>Reise-ID</td>
			    </tr>
			</thead>

			@foreach ($teilnehmer as $kunde)
			<tbody>
					<tr id="teil" onclick='pick({{ $kunde->id }}, this, this.id)'>
						<td>{{ $kunde->id }}</td>
						<td>{{ $kunde->vorname }}</td>
						<td>{{ $kunde->nachname }}</td>
						<td>{{ $kunde->strasse }}</td>
						<td>{{ $kunde->strNr }}</td>
						<td>{{ $kunde->plz }}</td>
						<td>{{ $kunde->ort }}</td>
						<td>{{ $kunde->reise_id }}</td>
					</tr>
				</tbody>
			@endforeach
		</table>
		<section class ="container">
			{{$teilnehmer->appends(['rechnungen' => $rechnungen->currentPage()])->links()}}
		</section>
	</div>

</section>

<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

</body>

<script type="text/javascript">

	$( document ).ready(function() {
	   setTimeout(function() {
		$('#msg').fadeOut();
		}, 3000 );
	});



	var selectedRechId = "";
	var selectedTeilId = "";
	var bla = "";
	window.csrfToken = '<?php echo csrf_token(); ?>';

	function getValue (dauer){

		var num = 0;
		var nameum = 0;

		if(dauer < 7){

			for (var i = dauer; i <= 7; i++){
				
				if( i < 7){
					num = i+1;
				}else{
					nameum = i;
				}
			
				var string = "Tag " + num
				document.getElementById(string).style.display = 'none';
				document.getElementById(num).style.display = 'none';
			}

		}


		document.getElementById('tage_select').value = dauer;


	}

	function load (id, click_id){
		
		if (click_id == 1){

			var url = '{{(route("rechnungHinzufuegen", ":id"))}}'
			url = url.replace(':id', id);

			window.location.href = url;

		}else if (click_id == 2){

			var url = '{{(route("teilnehmerHinzufuegen", ":id"))}}'
			url = url.replace(':id', id);

			window.location.href = url;

		}else if (id == 3){

			if(selectedRechId != ""){

				var url = '{{(route("anzeigenRech", ":id"))}}'
				url = url.replace(':id',  window.selectedRechId);

				window.location.href = url;
			}else{
				
				alert("Bite wählen sie eine Rechnung aus");

			}

		}else if (id == 4 ){

			if(selectedRechId != ""){

				var url = '{{(route("deleteRechnung", ":id"))}}'
				url = url.replace(':id', selectedRechId);

			 	var form =
		            $('<form>', {
		                'method': 'POST',
		                'action': url
		            });

		        var token =
		            $('<input>', {
		                'name': '_token',
		                'type': 'hidden',
		                'value': window.csrfToken
		            });

		        var hiddenInput =
		            $('<input>', {
		                'name': '_method',
		                'type': 'hidden',
		                'value': 'DELETE'
		            });

		        form.append(token, hiddenInput).appendTo('body');
		        form.submit();
	        }else{
	
				alert("Bite wählen sie eine Rechnung aus");
			}

		}else if (id == 5){

			if(selectedTeilId != ""){

				var url = '{{(route("anzeigeTeilnehmer", ":id"))}}'
				url = url.replace(':id',  window.selectedTeilId);

				window.location.href = url;
			}else{
	
				alert("Bitte wählen Sie einen Teilnehmer aus");
			}




		}else if (id == 6 ){

			if(selectedTeilId != ""){

				var url = '{{(route("deleteTeilnehmer", ":id"))}}'
				url = url.replace(':id', selectedTeilId);

			 	var form =
		            $('<form>', {
		                'method': 'POST',
		                'action': url
		            });

		        var token =
		            $('<input>', {
		                'name': '_token',
		                'type': 'hidden',
		                'value': window.csrfToken
		            });

		        var hiddenInput =
		            $('<input>', {
		                'name': '_method',
		                'type': 'hidden',
		                'value': 'DELETE'
		            });

	        form.append(token, hiddenInput).appendTo('body');
	        form.submit();


			}else{
				alert("Bitte wählen Sie einen Teilnehmer aus");
			}

			
			
		}
	}


	function pick(id, element, origin){



	    var selected = "";

	    var tableRech = document.getElementById("tableRech").getElementsByTagName("tr");
	    var table = document.getElementById("table").getElementsByTagName("tr");

	    for(var x = 0; x < table.length; x++) {

	      table[x].className = "";

	    }

	    for(var x = 0; x < tableRech.length; x++) {

	      tableRech[x].className = "";

	    }


	    if(element.className == "hovered"){
	      selected = true;
	    }else{
	      selected = false;
	    }

	    element.className="";
	    if(!selected){
	      element.className = "hovered";
	    }

	    window.bla = element.className;

	    if(origin == 'rech'){

	    	window.selectedRechId = id;
	    	window.selectedTeilId = "";

	    }else{

	    	window.selectedTeilId = id;
	    	window.selectedRechId = "";

	    }

  	} 

  	function bearbeiten(){

  		changetextbox();
		document.getElementById('titel').disabled = false;
		document.getElementById('tage_select').disabled = false;
		document.getElementById('saveBtn').style.display = 'inline';
		document.getElementById('changeBtn').style.display = 'none';
		document.getElementById('preis').disabled = false;
		document.getElementById('datum').disabled = false;
		
	}

	function changetextbox(){

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

	document.getElementById("saveBtn").onclick = function(){
		document.getElementById("saveBtn").disabled = true;
		document.getElementById("req").submit();
	
	}

</script>
</html>