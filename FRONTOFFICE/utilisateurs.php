<?php
function connect_to_mydevblog(){
$servername="localhost";
$username="root";
$databasename="mydevblog";
$password="";

try {
    $pdo= new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $pdo->setAttribute (PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    echo "Connected successfully";
    return $pdo;
} catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
}

$pdo=connect_to_mydevblog(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="style.css" />
        <title>Le guide du marketeur</title> 
    </head>
    <body>
  <?php  
  $query = $pdo->query("SELECT * FROM users");
  $users = $query->fetch();
  var_dump($users); 
  ?>

<p><a href="homepage.php">Revenir à l'accueil</a></p>
</body>

<html>
</html>