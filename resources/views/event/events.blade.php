<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<header>
	 @include ('static.nan')
</header>
<section class="container">
	<center>
		<h1>All the Events</h1>

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

		@foreach ($events as $events)
		  <tbody >
		    <tr onclick='test({{ $events->id }}, this)'>
		      <td>{{ $events->id }}</td>
		      <td>{{ $events->preis }}</td>
		      <td>{{ $events->kurzbeschrieb }}</td>
		      <td>{{ $events->titel }}</td>
		      <td>{{ $events->dauer }}</td>
		      <td>{{ $events->status }}</td>
		      <td>{{ $events->datum }}</td>
		      
		    </tr>
		  </tbody>
		@endforeach
		</table>

		<div class="col-sm-2"> 
			<button class='btn btn-primary' id="1" onclick="load(this.id)">Rechnung hinzufuegen</button>
		</div>

		<div class="col-sm-2">
			<button class='btn btn-primary' id="2" onclick="load(this.id)">Details</button>
		</div>
	</center>
</section>


</body>
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
  }

</script>



</script>

</html>