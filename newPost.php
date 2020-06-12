<?php
include "database/connection.php";
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>New Post</title>
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
    <link rel="stylesheet" href="../news.css">

    <link rel="icon" type="image/png" href="../img/Logo.png"><!--Favicon (Bild im Tab)-->

    <style>

      
      #formPost{
        width: 70%;
        margin: 0 auto;
      }
    
    </style>
  </head>
  <body>
 
    <header class="page-header" style="background: none;">
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
            <li class="active"><a href="#">New post</a></li>
          </ul>
          
          <?php if(isset($_SESSION["angemeldet"])): ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Hallo, ".$_SESSION["username"]; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="meinKonto.php">Mein Konto</a></li>
                  <li><a href="#">Meine Beiträge</a></li>
                  <li><a href="#">Chat</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="login.php?logout=true">Abmelden</a></li>
                </ul>
              </li>
            </ul>
          <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Login</a></li>
              <li><a href="regist.php">Registrieren</a></li>
            </ul>
          <?php endif; ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      
    </nav>
   

    <div class="jumbotron header-jumbotron" id="jumboBild">
      
      <form class="form-horizontal" method="POST" action="index.php">
        <div class="form-group" id="formPost">
          <label for="eingabefeldEmail3" class="col-sm-2 control-label">Title</label>
           <input type="text" name="title" class="form-control" id="eingabefeldEmail3" placeholder="Title">
        </div>
        <div class="form-group" id="formPost">
          <label for="eingabefeldEmail3" class="col-sm-2 control-label">Bild-Url</label>
           <input type="text" name="bild" class="form-control" id="eingabefeldEmail3" placeholder="Bild-Url">
        </div>
        <div class="form-group" id="formPost">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea class="form-control" name="inhalt" rows="43"></textarea>
        </div>
        <button type="submit" name="PostBtn" class="btn btn-primary btn-lg" role="button">Create</button>
      </form>
    </div>
    

  </header>
    
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->

  </body>
</html>