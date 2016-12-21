<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
	<script src="js/sweetalert.min.js"></script>
</head>
<body>

<header>
 	@include ('static.nav')
</header>

@if(Session::has('message'))
	<p class="{{ Session::get('css') }}" >{{ Session::get('message') }}</p>
@endif

<section class="container">


<div class="form-group row">
	<h1>
		<lable class="col-sm-6">Benutzer anzeigen </lable>
		<div class="col-md-6 text-right">
			<button class='btn btn-success' id="1" onclick="load(this.id)" type="button">Hinzufuegen</button>
			<button class='btn btn-danger' id="2" onclick="load(this.id)" type="button">Loeschen</button>
		</div>
	</h1>
</div>



		<table id="table" class="table table-striped table-bordered" >

			<thead>
			    <tr>
			        <td>ID</td>
			        <td>Name</td>
			        <td>E-Mail</td>
			        <td>Admin</td>
			          
			    </tr>
			</thead>

			@foreach ($users->all() as $user)
			  <tbody >
			    <tr onclick='pick({{ $user->id }}, this)'>
			      <td>{{ $user->id }}</td>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->email }}</td>
				  <td>{{ $user->isAdmin}}</td>
			    </tr>
			  </tbody>
			@endforeach
		</table>

		<section class ="container">
			{{ $users->render() }}
		</section>


</section>
</body>
<script>

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

	function load(id){


		if(id == 1){

			var url = '{{(route("createUser"))}}'
			window.location.href = url;

		}else if(id == 2){

			if(selectedId != ""){

				var url = '{{(route("deleteUser", ":id"))}}'
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

			}else{

				swal({
					title: "Bitte wählen sie einen Benutzer aus!",
					text: "",
					type: "error",
					confirmButtonText: "Ok"
				});
			} 
		}
	}

</script>
</html>