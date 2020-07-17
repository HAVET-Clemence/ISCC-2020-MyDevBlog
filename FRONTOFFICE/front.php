<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Le guide du marketeur</title> 
    </head>

    <body>
      
     <?php  include("navigation.php"); ?>
       

<?php
foreach($_GET as $key => $value){
    
    if ($key == "page" && $value == 1){
        include("homepage.php");
    }
    if ($key == "page" && $value == 2){
        include("articles.php");
    }
    if ($key == "page" && $value == 3){
        include("contact.php");
    }
    }
    include("footer.php"); ?>

    </body>
</html>