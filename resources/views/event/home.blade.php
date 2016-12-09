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

              <table class="table table-striped table-bordered">

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
                  <tbody>
                    <tr onclick='test({{ $events->id }})'>
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

        </article>
      </center>
    </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">

function test(id){

  var url = '{{(route("myRoute", ":id"))}}'
  url = url.replace(':id', id);

  window.location.href = url;

}

</script>
    </body>
</html>
