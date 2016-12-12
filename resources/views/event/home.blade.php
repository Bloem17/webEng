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
            <p>
              <form action='/event/create'>
                <button type='submit' class='btn btn-primary btn-lg'> Event hinzufuegen</button>
              </form>
            </p>
            
            
        </article>
      </center>
    </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>
