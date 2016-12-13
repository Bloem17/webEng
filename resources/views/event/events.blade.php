<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
	<script src="js/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<header>
	 @include ('static.nav')
</header>
<section class="container">
	<center>
	<article class="jumbotrons">
		<h1>All the Events</h1>
	</center>
	<section class ="container">
		<p>
			<button class='btn btn-primary' id="1" onclick="load(this.id)">Rechnung hinzufuegen</button>
			<button class='btn btn-primary' id="2" onclick="load(this.id)">Details</button>
		</p>
	</section>
	<center>

		<table id="table" class="table table-striped table-bordered" >

		<thead>
		    <tr>
		        <td>ID</td>
		        <td>Preis</td>
		        <td>Kurzbeschrieb</td>
		        <td>Titel</td>
		        <td>Dauer</td>
		        <td>Status</td>
		        <td>Datum</td>
		          
		        
		    </tr>
		</thead>

		@foreach ($events->all() as $event)
		  <tbody >
		    <tr onclick='test({{ $event->id }}, this)'>
		      <td>{{ $event->id }}</td>
		      <td>{{ $event->preis }}</td>
		      <td>{{ $event->kurzbeschrieb }}</td>
		      <td>{{ $event->titel }}</td>
		      <td>{{ $event->dauer }}</td>
		      <td>{{ $event->status }}</td>
		      <td>{{ $event->datum }}</td>
		      
		    </tr>
		  </tbody>
		@endforeach
		</table>

		<section class ="container">
			{{ $events->render() }}
		</section>

		</center>
	</article>
</section>


<script type="text/javascript">

	

  var selectedId = "";
  var bla = "";

  function test(id, element){

    var selected = "";

    var testen = document.getElementById("table").getElementsByTagName("tr");
    for(var x = 0; x < testen.length; x++) {

      testen[x].className = "";

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
    window.selectedId = id;

  } 

  function load(btnId){

  	if(selectedId != ""){

		if(btnId == 1 ){

			var url = '{{(route("abrechnung", ":id"))}}'
			url = url.replace(':id', selectedId);
			window.location.href = url;

	    }else if(btnId == 2){

			if(bla == 'hovered'){

			    var url = '{{(route("myRoute", ":id"))}}'
			    url = url.replace(':id', selectedId);
			    window.location.href = url;
	      
      		}
	    } 
  	}else{
  		swal({
			title: "Bitte wählen sie einen Event aus!",
			text: "",
			type: "error",
			confirmButtonText: "Ok"
	});
  	}  
  }

</script>

</body>


</html>