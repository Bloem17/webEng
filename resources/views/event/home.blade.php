<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
    </head>
    <body>

    <header>

    @include ('static.nav')
       
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
</body>
</html>
