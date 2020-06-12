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
    <title>News</title>
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

  </head>
  <body>
 
    <header class="page-header">
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
            <li class="active"><a href="news.php">News</a></li>
            <?php if(isset($_SESSION["angemeldet"])):?>
              <li><a href='newPost.php'>New post</a></li>
            <?php endif; ?>
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
    <div class="jumbotron header-jumbotron">
      <div class="container">
          <h1>aktuelle News</h1>
          <p>Hier kommt irgendein cooler satz hin</p>
          <p><a class="btn btn-primary btn-lg" href="#about-us" role="button">Mehr erfahren</a></p>
      </div>
    </div>
    <div class="about-us-container" id="about-us">
      <div class="container news-container">
        <div class="row">
          
          <?php foreach($res as $value):?>    
              <div class="col-md-6">
        
                <div class="thumbnail newsBox">
                  <img src="<?php echo $value["bild"];?>" style="height: 150px;" alt="...">
                  <div class="caption">
                    <h3><?php echo $value["title"]; ?> <br> <small>von <?php echo $value["verfasser"]; ?></small></h3>
                    <p>...</p>
                    <p><a href="artikel.php?title=<?php echo $value["title"]; ?>" class="btn btn-primary" role="button">Mehr anzeigen</a></p>
                  </div>
                </div>
                
              </div>
          <?php endforeach; ?>
        </div>
       
      </div>
    </div>
        
  </header>
    
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script>
      let createPostBtn = document.getElementById("createPostBtn");
      let titleInput = document.getElementById("titleInput");
      let bildurl = document.getElementById("bildurl");
      createPostBtn.addEventListener("click", ()=>{
        if(titleInput.value.length > 0){
          window.location = "newPost.php?title="+titleInput.value+"&bild="+bildurl.value;
        }
      })
    </script>
  </body>
</html>