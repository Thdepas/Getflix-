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
<?php

$reponse = $bdd->query('SELECT firstname,lastname FROM user ORDER BY id DESC LIMIT 1');

while ($donnees = $reponse->fetch())
{ 
    echo "Welcome ". htmlspecialchars($donnees['firstname']) . " " . htmlspecialchars($donnees['lastname'] . "!" );
}

$reponse->closeCursor();
?>
</body>
</html> 