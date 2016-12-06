<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

</head>
<body onload='getValue({{$event->dauer}})'>

@include ('static.navigation')
<div class="form-group row">

	<label class="col-sm-3 col-form-label"><h1>Event anzeigen</h1></label>

	<div class="col-sm-1 col-form-label"> 
		<button class='btn btn-primary' onclick="load({{$event->id}})">Rechnung hinzufuegen</button>
	</div>

</div>

<div class="form-group row">
	
</div>
<!-- 
	{{csrf_field()}} generate a token field which is send with the HTML request to validate it
	something something CSRF protection middelware
-->
{{ csrf_field() }}

<div class="form-group row">
  <label class="col-sm-1 col-form-label">Event-ID</label>
  <div class="col-sm-10">
    <input class="form-control" id="" disabled value="{{$event->id}}" name="titel">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-1 col-form-label">Titel</label>
  <div class="col-sm-10">
    <input class="form-control" id="" disabled value="{{$event->titel}}" name="titel">
  </div>
</div>

<div class="form-group row">
	 		<label for="" class="col-sm-1 col-form-label">Dauer</label>
	 		<div class="col-sm-10">
 	 		<select class="custom-select" id='tage_select' disabled name="select" >
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
    		<input class="form-control" id="" disabled name="preis" value="{{$event->preis}}"></input>
 	 	</div>
  		<label class="col-sm-2 col-form-label">CHF</label>
</div>

<div class="form-group row">
<label class="col-sm-1 col-form-label"><h1>Rechnungen</h1></label>

	<table class="table table-striped table-bordered">

		<thead>
		    <tr >
		        <td>ID</td>
		        <td>Rechnungs-Nr</td>
		        <td>Betrag</td>
		        <td>Rechnungstyp</td>
		        <td>Reise-ID</td>
		        <td>created_at</td>
		        <td>updated_at</td>
		    </tr>
		</thead>

		@foreach ($event->rechnung as $rechnung)
		<tbody>
				<tr>
					<td>{{ $rechnung->id }}</td>
					<td>{{ $rechnung->rechnungsNr }}</td>
					<td>{{ $rechnung->betrag }}</td>
					<td>{{ $rechnung->rechnungstyp }}</td>
					<td>{{ $rechnung->reise_id }}</td>
					<td>{{ $rechnung->created_at }}</td>
					<td>{{ $rechnung->updated_at }}</td>
				</tr>
			</tbody>
		@endforeach
	</table>
</div>



<script type="text/javascript">

	function getValue (dauer){

		var num = 0;

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

	function load (id){

		var url = '{{(route("route2", ":id"))}}'
		url = url.replace(':id', id);

		window.location.href = url;

	}

</script>

</body>
</html>