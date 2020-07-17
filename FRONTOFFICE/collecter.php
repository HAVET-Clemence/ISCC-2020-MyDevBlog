<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"]; 
    $login = $_POST["login"]; 
    $password = $_POST["password"]; 
    
    if (!isset($name)){
      die("S'il vous plaît entrez votre nom");
    }

    if (!isset($login)){
        die("S'il vous plaît entrez votre identifiant");
      }
   

    if (!isset($password)){
        die("S'il vous plaît entrez un mot de passe");
      }
    }
    ?>

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

$pdo=connect_to_mydevblog();

$statement = $pdo->prepare("INSERT INTO users (name, login, password) VALUES(?, ?, ?)"); 
$statement->execute(array($name, $login, $password)); 


?>