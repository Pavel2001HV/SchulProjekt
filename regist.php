<?php
    include "database/connection.php";
    //Als nächstes mit der SESSION weiter machen!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Registrieren</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- Das neueste kompilierte und minimierte CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Das neueste kompilierte und minimierte JavaScript -->


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../login.css">

    <link rel="icon" type="image/png" href="../img/Logo.png"><!--Favicon (Bild im Tab)-->

  </head>
  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="position: relative; top: -6px" href="#"><img src="../img/Logo.png" alt="Globus mit Bleistift" width="30" height="30"></a>
            </div>
        
            <!-- Alle Navigationslinks, Formulare und anderer Inhalt werden hier zusammengefasst und können dann ein- und ausgeblendet werden -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home <span class="sr-only">(aktuell)</span></a></li>
                <li><a href="news.php">News</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="regist.php">Registrieren</a></li>

            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        
        </nav>
        
      <div class="row login-custom login-container d-flex align-items-center justify-content-center">
          <form class="login-form" method="post" action="regist.php">
        
              <h1 class="mb-5 font-weight-light text-uppercase">Registrieren</h1>
              <?php 
                if(isset($_POST["regsub"])){
                    insert_user($_POST);
                }
              ?>
              <div class="form-group">
                  <input type="text" name="username" class="form-control rounded-pill form-control-lg" placeholder="Username">
              </div>
            
              <div class="form-group">
                  <input type="email" name="email" class="form-control rounded-pill form-control-lg" placeholder="Email">
              </div>
              <div class="form-group">
                  <input type="password" name="password" class="form-control rounded-pill form-control-lg" placeholder="Password">
              </div>
            
           
              <button type="submit" name="regsub" class="btn mt-5 btn-primary btn-custom btn-block text-uppercase rounded-pill button-lg">Registrieren</button>
          </form>
      </div>
    
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>