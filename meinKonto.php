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
    <title>Mein Konto</title>
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
            <li><a href="news.php">News</a></li>
            <?php if(isset($_SESSION["angemeldet"])):?>
              <li><a href='newPost.php'>New post</a></li>
            <?php endif; ?>
          </ul>
          
          <?php if(isset($_SESSION["angemeldet"])): ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Hallo, ".$_SESSION["username"]; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a href="#">Mein Konto</a></li>
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
          <h1>Mein Konto</h1>
          <p>Hier kommt irgendein cooler satz hin</p>
          <p><a class="btn btn-primary btn-lg" href="#about-us" role="button">Mehr erfahren</a></p>
      </div>
    </div>
    <div class="about-us-container" id="about-us">
      <div class="container news-container">
        <div class="row">
        <form id="form" method="POST" action="index.php">
       
            <div class="form-group" id="nameForm">
          
                <label for="exampleInputEmail1">Name</label>
                <input type="text" id="username" name="usernameUpdate" value="<?php echo fetch_userdatas($_SESSION["username"])["username"];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                
            </div>
            <div class="form-group" id="emailForm">
              
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" id="email" name="emailUpdate" value="<?php echo fetch_userdatas($_SESSION["username"])["email"];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" id="password" name="passwordUpdate" value="<?php echo fetch_userdatas($_SESSION["username"])["password"];  ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" id="profilbild" name="profilbildUpdate" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <button type="button" id="save" name="updateProfil" class="btn btn-primary">Änderung speichern</button>
        </form>
      
        </div>
       
      </div>
    </div>
        
  </header>
    
    <!-- jQuery (wird für Bootstrap JavaScript-Plugins benötigt) -->
    
    <!-- Binde alle kompilierten Plugins zusammen ein (wie hier unten) oder such dir einzelne Dateien nach Bedarf aus -->
    <script>
        let saveBtn = document.getElementById("save");
        let username = document.getElementById("username");
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let profilbild = document.getElementById("profilbild");
        let warnDiv = document.createElement("div");
        let warnDivUserExist = false;
 
        let warnDivEmailExist = false;
        saveBtn.addEventListener("click", ()=>{
            $.ajax({
                url: "database/connection.php",
                method: "post",
                data: $("#form").serialize(),
                success: function(strDate){
                    //alert(strDate);
                    if(strDate == "username"){
                        createWarning("Username");
                        
                    }else if(strDate == "email"){
                        createWarning("Email");
                    }else{
                        if(warnDivUserExist){
                            nameForm.removeChild(warnDiv);
                            warnDivUserExist = false;
                        }
                        if(warnDivEmailExist){
                            emailForm.removeChild(warnDiv);
                            warnDivEmailExist = false;
                        }
                        window.location = "index.php";
                    }

                  
                }
            })
        })
        function createWarning(name){           
            
            let emailForm = document.getElementById("emailForm");
            let nameForm = document.getElementById("nameForm");
            if(warnDivUserExist){
                nameForm.removeChild(warnDiv);
            }else if(warnDivEmailExist){
                emailForm.removeChild(warnDiv);
            }
            warnDiv.classList.add("alert-warning")
            warnDiv.classList.add("alert")
            warnDiv.role = "alert";
            warnDiv.innerHTML = name + " schon vergeben";
            if(name == "Username"){
                nameForm.prepend(warnDiv);
                warnDivUserExist = true;
                warnDivEmailExist = false;

                
            }else if(name == "Email"){
                emailForm.prepend(warnDiv);
                warnDivEmailExist = true;
                warnDivUserExist = false;

            }


        }

    </script>
  </body>
</html>