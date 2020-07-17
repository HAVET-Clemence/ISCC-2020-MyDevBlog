<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="style.css" />
        <title>Le guide du marketeur</title> 
    </head>

    <body>
    
          <?php  include("nav.php"); ?>
     
      <?php
    foreach($_GET as $key => $value){
    
    if ($key == "page" && $value ==4 ){
        include("ajoutarticle.php");
    }
    if ($key == "page" && $value == 5){
        include("utilisateurs.php");}
    }
  
    ?>
</body>
</html>