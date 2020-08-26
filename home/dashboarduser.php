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
$reponse = $bdd->query('SELECT status, id, firstname, lastname, email FROM user ORDER BY id ASC ');
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
<?php
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{ 
echo    

                '<tr>
                <td>' . htmlspecialchars($donnees['id']) .'</td>
                <td>'  . htmlspecialchars($donnees['firstname']) .
                " </td><td>"  .  htmlspecialchars($donnees['lastname']) .
                " </td><td>" . htmlspecialchars($donnees['email']) .'</td>'.
                " </td><td>" . htmlspecialchars($donnees['status']) .'</td>'.
                '</tr>'
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