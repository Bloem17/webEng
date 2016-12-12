<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="/css/app.css" rel="stylesheet">
        <title>Home</title>
    </head>
    <body>

    <header>

    @include ('static.nan')
       
    </header>

    <section class="container">
      <center>
        <article class="jumbotrons">
          <header>
            <h1>Herzlich Willkommen</h1>
          </header>
            <p>
              Diese Webpage wurde entwickelt um die Reiseverwaltung zu vereinfachen
            </p>
            
            <h1>All the Events</h1>

              <table id="table" class="table table-striped table-bordered" >

                <thead>
                    <tr >
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

        </article>
      </center>
    </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
    </body>
</html>
