<!DOCTYPE html>
<html>
<head>
	<title>Reisen</title>
	
	

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
			<div class="col-md-6 ">
			<div class="col-lg-3">			
			<div class="form-group">
			  <select class="form-control" id="searchOption">
			    <option value="id" >ID</option>
			    <option value="titel" >Titel</option>
			  </select>
			</div>
			</div>
			  <div class="col-lg-4">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button" onclick="searchData()">Go!</button>
			      </span>
			      <input id="search" type="text" class="form-control" placeholder="Search for...">
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
	
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
			  </tbody>
			@endforeach
		</table>

		<section id="pagination" class ="container">
			{{ $events->render() }}
		</section>

	</center>

</section>
<script src="js/sweetalert.min.js"></script>
</body>


<script type="text/javascript">

$( document ).ready(function() {
   setTimeout(function() {
	$('#msg').fadeOut();
	}, 3000 );

   setContent({!! json_encode($events->toArray()) !!});

});
  	
  var check = false;
  var selectedId = "";
  var bla = "";
  window.csrfToken = '<?php echo csrf_token(); ?>';

  function searchData(){

  	window.check = false;

  	var data = {!! json_encode($eventsAll->toArray()) !!};

  	var notFound = {!! json_encode($events->toArray()) !!};

  	var searchString = document.getElementById('search').value;

  	var result = [];

  	var subData = [];

  	var option = document.getElementById('searchOption').value;	


  	for ( var i = 0; i < data.length; i++){

  		if(!searchString){
  			
  			subData.push(notFound.data[i]);
  			window.check = true;
  			document.getElementById('pagination').style.visibility = 'visible';
  	
  		}else if(option == 'id'){

  			if( searchString == data[i].id){
	  			subData.push(data[i]);
	  			document.getElementById('pagination').style.visibility = 'hidden';
	  			window.check = true;
	  		} 

  		}else if (option == 'titel'){

	  		if( searchString == data[i].titel){
	  			subData.push(data[i]);
	  			document.getElementById('pagination').style.visibility = 'hidden';
	  			window.check = true;
	  		} 
  		}
  	}


	if(!window.check){
		document.getElementById('pagination').style.visibility = 'hidden';
			swal({
			title: "Keine Resultate gefunden",
			text: "",
			type: "error",
			confirmButtonText: "Ok"
		});
	}
  		
  	result = {"data": subData};	

  	var length =  document.getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
  	
  	for ( var i = 0; i < length; i++){
  	
  		var table = document.getElementsByTagName('table')[0];  

  		table.deleteRow(-1);		

  	}
  	
	setContent(result);  	

  }


  function setContent(events){

	var content = ['id', 'preis', 'kurzbeschrieb', 'titel', 'dauer', 'status', 'datum'];


	for (var i = 0; i < events.data.length; i++){

		var table = document.getElementsByTagName('tbody')[0];
		var tr = document.createElement('tr');

		tr.onclick = function (){ pick(this) };

	   	for (var j = 0; j < 7; j++){
	   		var td = document.createElement('td');	
	   		td.appendChild(document.createTextNode(events.data[i][content[j]]));
	   		tr.appendChild(td);
	   	}

	   	table.appendChild(tr);

	}


  }


  function pick(element){


  	

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
    window.selectedId = element.getElementsByTagName('td')[0].innerHTML;
 	

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