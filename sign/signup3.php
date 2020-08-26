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
        <?php include("/var/www/html/getflix/scripts/connectdb.php");?>
        <a href = "/getflix/home/home.php"><button type="button">Click Me!</button></a>
<?php
$reponse = $bdd->query('SELECT firstname,lastname FROM user ORDER BY id DESC LIMIT 1');

$donnees = $reponse->fetch();

echo "Welcome ". htmlspecialchars($donnees['firstname']) . " " . htmlspecialchars($donnees['lastname'] . "!" );


$reponse->closeCursor();
?>
</body>
</html>  