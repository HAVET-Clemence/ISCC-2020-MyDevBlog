<?php

function connect_to_mydevblog(){
$servername="localhost";
$username="root";
$databasename="mydevblog";
$password="";

try {
    $pdo= new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $pdo->setAttribute (PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

  
    return $pdo;
} catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
}

$pdo=connect_to_mydevblog();

if(isset($_POST['article_titre'], $_POST['article_contenu'], 
$_POST['fileToUpload'],$_POST['auteur'])) {
if(empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])
AND !empty($_POST['fileToUpload']) AND !empty($_POST['auteur']) AND !empty($_POST['extrait'])){


$article_titre = htmlspecialchars($_POST['article_titre']);
$article_contenu = htmlspecialchars($_POST['article_contenu']);
$extrait = htmlspecialchars($_POST['extrait']);
$fileToUpload = htmlspecialchars($_POST['fileToUpload']);
$fileToUpload = htmlspecialchars($_POST['auteur']);


$statement = $pdo->prepare("INSERT INTO articles 
(titre, contenu, extrait, img, auteur, date_publi)
VALUES (?, ?, ?, ?, ?, NOW())");
$statement->execute(array($article_titre, $article_contenu, $extrait, $fileToUpload, $auteur,));

$message = "Votre article a bien été posté";

    } else {
        $message = "Veuillez remplir tous les champs ";
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="style.css" />
        <title>Ajouter un article</title> 
      
     </head>
    

<body>

<form method = "POST" enctype="multipart/form-data" >
    <p><input type="text" name= "article_titre" placeholder="Titre"/></p>
    <p><input type="file" name="fileToUpload" id="fileToUpload"><br></p>
    <p><textarea name= "article_contenu" placeholder="Contenu de l'article"></textarea></p>
    <p><textarea name= "extrait" placeholder="Extrait de l'article"></textarea></p>
    <p><input type="text" name= "auteur" placeholder="Auteur"/><br></p>
    <p><input type="submit" value="Envoyer l'article"/><br></p>
</form>
<br>
<?php if(isset($message)) { echo $message;} ?>

<a href="front.php?page=1">Revenir à l'accueil</a>

</body>
</html>
