<?php
session_start();
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
?>
<?php include("/home/dusztsuv/public_html/getflix/home/head.php");?>
    <title>N.E.T_P</title>
</head>

<body>
<div class="container-fluid">
<div class="row m-5 justify-content-start align-items-center">
    <?php


    $sort = $_GET['sort'];
    $order = $_GET['order'];

    $sql = 'SELECT  * FROM movies ORDER BY ' . $sort . ' ' . $order;

    if ($order == "ASC") {
        $order = "DESC";
    } else {
        $order = "ASC";
    }

    $reponse = $bdd->query($sql);
    ?>
    <a class='btn btn-dark' role='button' href='/getflix/dashboard/dashboard.php'>Back</a>
    <a class='btn btn-dark' role='button' href='/getflix/dashboard/movies/moviesadd.php'>Add</a>
    <table class="table">
        <thead>
            <tr>
                <th><a href="/getflix/dashboard/movies/dashboardmovies.php?sort=id&order=<?php echo $order ?>">ID</a></th>
                <th><a href="/getflix/dashboard/movies/dashboardmovies.php?sort=title&order=<?php echo $order ?>">Title</a></th>
                <th><a href="/getflix/dashboard/movies/dashboardmovies.php?sort=director&order=<?php echo $order ?>">Director</a></th>
                <th><a href="/getflix/dashboard/movies/dashboardmovies.php?sort=genre&order=<?php echo $order ?>">Genre</a></th>
                <th><a href="/getflix/dashboard/movies/dashboardmovies.php?sort=year&order=<?php echo $order ?>">Year</a></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            while ($donnees = $reponse->fetch()) {
                echo

                    "<tr><td>"      . htmlspecialchars($donnees['id']) .
                        "</td><td>"     . htmlspecialchars($donnees['title']) .
                        "</td><td>"     . htmlspecialchars($donnees['director']) .
                        "</td><td>"     . htmlspecialchars($donnees['genre']) .
                        "</td><td>"     . htmlspecialchars($donnees['year']) .
                        "</td><td>"    . "<a class='btn btn-dark' role='button' href='/getflix/dashboard/movies/moviesedit.php?id=" . $donnees['id'] . "'>Edit</a>" .
                        "</td><td>"    . "<a class='btn btn-dark'  role='button' href='/getflix/dashboard/movies/moviesdelete.php?id=" . $donnees['id'] . "'>Delete</a>" .
                        "</td></tr>";
            }
            $reponse->closeCursor();
            ?>


        </tbody>
    </table>
    <a class='btn btn-dark' role='button' href='/getflix/dashboard/dashboard.php'>Back</a>
</div>
</div>
    <!--JS Scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>