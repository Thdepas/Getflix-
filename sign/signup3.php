<?php 
include("/home/dusztsuv/public_html/getflix/home/head.php");
include('/home/dusztsuv/public_html/getflix/scripts/connectdb.php'); 
?>

   <title>N.E.T_P</title>
      </head>
   <body>
   <div class="container-fluid d-flex flex-column">
            <div class="row m-5 justify-content-start">
                <a href="/getflix/home/home.php" class="navbar-brand netp" alt="N.E.T_P"><h1>N.E.T_P</h1></a>    
            </div>
          
            
            <div class="row m-5 justify-content-center flex-column align-items-center title">
                <div class="row m-2 justify-content-center">
                    <h2>Sign Up</h2>  
                </div>
                <div class="row m-2 justify-content-center">
                    <span class="round">1</span> <img src="/getflix/img/icon/arrow.svg" class="mx-2">
                    <span class="round">2</span> <img src="/getflix/img/icon/arrow.svg" class="mx-2">
                    <span class="round">3</span> 
                </div>
                <div class="row m-5 justify-content-center">
      
<?php
$reponse = $bdd->query('SELECT id, firstname,lastname, email FROM user ORDER BY id DESC LIMIT 1');
$donnees = $reponse->fetch();

$_SESSION['id'] = $donnees['id'];
$_SESSION['email'] = $donnees['email'] ;


echo "Welcome ". htmlspecialchars($donnees['firstname']) . " " . htmlspecialchars($donnees['lastname'] . "!" );


$reponse->closeCursor();
?></div><a href = "/getflix/home/home.php"><button class="nextButton" type="button">Click Me!</button></a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>  