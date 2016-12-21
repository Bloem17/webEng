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
            <h1>Herzlich Willkommen {{Auth::user()->name}}</h1>
          </header>
            <p>
              Diese Webpage wurde entwickelt um die Reiseverwaltung zu vereinfachen
            </p>
            </article>
            </center>
            </section>
            <div class="form-group row">
              <img src="http://writm.com/wp-content/uploads/2016/08/travel-022.jpg" alt="W3Schools.com" style="height: 500px; width: 100%">
            </div>
        <section>
          <center>
            <article>
            <div class="form-group row">
              <label class = "col-sm-4" ></label>
              <div class = "col-sm-2">
                <form action='/event/create'>
                  <button type='submit' class='btn btn-success btn-lg'> Reise hinzufuegen</button>
                </form>
              </div>
              <div class = "col-sm-2">
                <form action='/events'>
                  <button type='submit' class='btn btn-primary btn-lg'> Reise anzeigen</button>
                </form>
              </div>
            </div>

            
        </article>
      </center>
    </section>
</body>
</html>
