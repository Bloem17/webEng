<!DOCTYPE html>
<html>
<head>
	<title>Reisen</title>
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
	<script src="js/sweetalert.min.js"></script>

</head>
<body >

<header>
	 @include ('static.nav')
</header>

@if(Session::has('message'))
	<p id="msg" class="{{Session::get('css')}}">{{ Session::get('message') }}</p>
@endif


<section class="container">

	<center>
		<h1>Alle Reisen:</h1>
	</center>

	<br/>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<button class='btn btn-primary' id="1" onclick="load(this.id)" type="button">Schlussabrechnung anzeigen</button>
			</div>
			<div class="col-md-6 text-right">
				<button class='btn btn-warning ' id="2" onclick="load(this.id)" type="button">Details</button>
				<button class='btn btn-danger ' id="3" onclick="load(this.id)" type="button">Loeschen</button>
				
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

</section>

</body>


<script type="text/javascript">

$( document ).ready(function() {
   setTimeout(function() {
	$('#msg').fadeOut();
	}, 10000 );
});

  var selectedId = "";
  var bla = "";
  window.csrfToken = '<?php echo csrf_token(); ?>';



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
					title: "Sind Sie sicher?",
					text: "Sie koennen die Reise nicht wiederherstellen",
					type: "warning",
					showCancelButton: true,
					cancelButtonText: "Abbrechen",
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Loeschen!",
					closeOnConfirm: false
				},
				function(){

					var url = '{{(route("deleteEvent", ":id"))}}'
					url = url.replace(':id', selectedId);

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

					});

      		}
	    }  

  	}else{
  		swal({
			title: "Bitte wählen sie eine Reise aus!",
			text: "",
			type: "error",
			confirmButtonText: "Ok"
		});
  	}  
}


</script>


</html>