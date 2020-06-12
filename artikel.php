<?php 
  include "database/connection.php"; 
  $title = $_GET["title"];
  $post = fetch_post($title);
 
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
    <link rel="stylesheet" href="../artikel.css">

    <link rel="icon" type="image/png" href="../img/Logo.png"><!--Favicon (Bild im Tab)-->
    <style>
      #jumboBild{
        margin-top: 100px;
        background: url(<?php echo $post["bild"]; ?>);
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        height: 200px;
      }
      #containerTitle{
        color: black; margin-top: 100px;
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
            <li><a href="#" role="button" data-toggle="modal" data-target="#meinModal">New post</a></li>
          </ul>
          
          <?php if(isset($_SESSION["angemeldet"])): ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Hallo, ".$_SESSION["username"]; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Mein Konto</a></li>
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
      <div class="container" id="containerTitle">
          <h2><?php echo $title;?></h2>
          <p>von <strong><small><?php echo $post["verfasser"]; ?></small> </strong></p>

          <p><?php echo $post["inhalt"]; ?></p>
         <!-- <p><a class="btn btn-primary btn-lg" href="#about-us" role="button">Mehr erfahren</a></p>-->
      </div>
    </div>
    <div class="modal fade" id="meinModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create Post</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="title" id="titleInput" class="form-control rounded-pill form-control-lg" placeholder="title">
        <input type="text" name="bildurl" id="bildurl" class="form-control rounded-pill form-control-lg" placeholder="Bild-Url">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
        <button type="button" id="createPostBtn" class="btn btn-primary">create</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </header>
    
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>