<?php 
session_start();
include('/var/www/html/getflix/scripts/connectdb.php'); 
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      </head>
   <body>
      <h2>Sign Up</h2> 
      <a href = "/getflix/home/home.php"><button type="button">Click Me!</button></a>
<?php
$reponse = $bdd->query('SELECT id, firstname,lastname, email FROM user ORDER BY id DESC LIMIT 1');
$donnees = $reponse->fetch();

$_SESSION['id'] = $donnees['id'];
$_SESSION['email'] = $donnees['email'] ;


echo "Welcome ". htmlspecialchars($donnees['firstname']) . " " . htmlspecialchars($donnees['lastname'] . "!" );


$reponse->closeCursor();
?>
</body>
</html>  