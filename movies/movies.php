<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/getflix/css/styles.css" />
    <title>Movies</title>
</head>
<body>
<?php
include("/var/www/html/getflix/scripts/connectdb.php");
$movieId = $_GET["movieId"];
$reponse = $bdd->prepare('SELECT * FROM movies WHERE id = :id');
$reponse->execute(array('id' => $movieId));
$donnees = $reponse->fetch();
?>
<div class="container-fluid"> 
    <div class="row">
        <div class="col-lg-3 offset-lg-1 col-md-3 offset-md-1 col-sm-4 text-center" style="border:1px solid black">
            <a href="<?php echo $donnees["trailer"]?>">
                <img src="/getflix/img/<?php echo $donnees["id"]?>.jpg" class="coverCarousel" alt="<?php echo $donnees["title"]?> cover">
            </a>
        </div>
        <div class='col-lg-7 col-md-7 col-sm-8'  style="border:1px solid black">
            <div class="row" style="border:1px solid black"><h2><?php echo $donnees["title"]?></h2></div>
            <div class="row" style="border:1px solid black">Director: <?php echo $donnees["director"]?></div>
            <div class="row" style="border:1px solid black">Genre :<?php echo $donnees["genre"]?></div>
            <div class="row" style="border:1px solid black">Year :<?php echo $donnees["year"]?></div>
            <div class="row" style="border:1px solid black">Length :<?php echo $donnees["length"]?></div>
            <div class="row" style="border:1px solid black">Rating :<?php echo $donnees["rating"]?></div>
            <div class="row" style="border:1px solid black">Synopsis :<?php echo $donnees["synopsis"]?></div>
        </div>
    </div>  
</div>
<a class='btn btn-dark'  role='button' href='/getflix/home/home.php'>Back</a>
    <!--JS Scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

