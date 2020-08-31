<?php 
session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <?php include('/var/www/html/getflix/home/navbar.php'); ?>
    <div class="row">
        <div class="col-lg-3 offset-lg-2 col-md-4 col-sm-12 col-12 text-center p-2">
            <a href="<?php echo $donnees["trailer"]?>">
                <img src="/getflix/img/cover/<?php echo $donnees["id"]?>.jpg" class="coverMovies" alt="<?php echo $donnees["title"]?> cover">
            </a>
        </div>
        <div class="col-lg-5 col-md-8 col-sm-12 col-12">
            <div class="row p-2"><h2><?php echo $donnees["title"]?></h2></div>
            <div class="row p-2">Director: <?php echo $donnees["director"]?></div>
            <div class="row p-2">Genre: <?php echo $donnees["genre"]?></div>
            <div class="row p-2">Year: <?php echo $donnees["year"]?></div>
            <div class="row p-2">Length: <?php echo $donnees["length"]?></div>
            <div class="row p-2">Rating: <?php echo $donnees["rating"]?></div>
            <div class="row p-2">Synopsis: <p class="text-justify"><?php echo $donnees["synopsis"]?></p></div>
            <div class="row p-2 mt-3 d-flex justify-content-end"><a class='btn btn-dark'  role='button' href='/getflix/home/home.php'>Back</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12 p-2">
            <h2>Comments</h2>
        </div>
    </div>
</div>

    <!--JS Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

