<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
<header>
	 @include ('static.nav')
</header>
<section class="container">
	<center>
	<article class="jumbotrons">
		<h1>All the Events</h1>
	</center>
	<br/>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<button class='btn btn-primary' id="1" onclick="load(this.id)">Schlussabrechnung anzeigen</button>
		</div>
		<div class="col-md-6 text-right">
			<button class='btn btn-warning ' id="2" onclick="load(this.id)">Details</button>
			<button class='btn btn-danger ' id="3" onclick="load(this.id)">Loeschen</button>
			
		</div>
		</div>
	</div>
<br/>

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
		    <tr onclick='pick({{ $event->id }}, this)'>
		      <td>{{ $event->id }}</td>
		      <td>{{ $event->preis }}</td>
		      <td>{{ $event->kurzbeschrieb }}</td>
		      <td>{{ $event->titel }}</td>
		      <td>{{ $event->dauer }}</td>
		      <td>{{ $event->status }}</td>
		      <td>{{ $event->datum}}</td>
		      
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



  function pick(id, element){

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

			    var url = '{{(route("anzeigen", ":id"))}}'
			    url = url.replace(':id', selectedId);
			    window.location.href = url;
	      
      		}
	    }

	    else if(btnId == 3){

	    	if(bla == 'hovered'){

			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(){
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
			 	var url = '{{(route("deleteEvent", ":id"))}}'
			    url = url.replace(':id', selectedId);
			    window.location.href = url;
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
			});

			

			   
	      
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