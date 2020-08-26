<?php
session_start();
include("/var/www/html/getflix/scripts/connectdb.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
<?php
$reponse = $bdd->query('SELECT  id, title, director, genre, year, length, synopsis, rating, trailer FROM movies ORDER BY id ASC ');
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Director</th>
            <th scope="col">Genre</th>
            <th scope="col">Year</th>
            <th scope="col">Length</th>
            <th scope="col">Synopsis</th>
            <th scope="col">Rating</th>
            <th scope="col">Trailer</th>
        </tr>
    </thead>
    <tbody>
<?php
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{ 
echo    

                "<tr><td>"      . htmlspecialchars($donnees['id']) .
                "</td><td>"     . htmlspecialchars($donnees['title']) .
                "</td><td>"     . htmlspecialchars($donnees['director']) .
                "</td><td>"     . htmlspecialchars($donnees['genre']) .
                "</td><td>"     . htmlspecialchars($donnees['year']) .
                "</td><td>"     . htmlspecialchars($donnees['length']) .
                "</td><td>"     . htmlspecialchars($donnees['synopsis']) .
                "</td><td>"     . htmlspecialchars($donnees['rating']) .
                "</td><td>"     . htmlspecialchars($donnees['trailer']) .
                "</td></tr>"
        ;

}?>






    </tbody>
</table>

<?php

$reponse->closeCursor();

?>

     <!--JS Scripts-->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script
      src="/getflix/scripts/carouselscript.js"
    ></script>
  

</body>
</html> 