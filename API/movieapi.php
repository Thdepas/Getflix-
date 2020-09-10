<?php include("/home/dusztsuv/public_html/getflix/home/head.php");?>
    <title>Movies</title>
</head>
<body>
<?php
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");
$movieId = $_GET["movieId"];

?>
<div class="container-fluid"> 
    <?php include('/home/dusztsuv/public_html/getflix/home/navbar.php'); ?>
    <div class="row" id="movieInfo">

    </div>
    <?php include("/home/dusztsuv/public_html/getflix/API/movieapiscript.php"); ?>
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12 p-2">
            <h2>Comments</h2>
            <?php

            $req = $bdd->prepare('  SELECT comment.id_comment, comment.id_author, DATE_FORMAT(comment.date_comment, "%d/%m/%Y %Hh%i") AS date , comment.id_movie, comment.message, user.id, user.firstname, user.lastname 
                                    FROM comment
                                    INNER JOIN user 
                                        ON comment.id_author=user.id
                                    WHERE comment.id_movie = :id_movie
                                    ORDER BY comment.id_comment DESC
                                    ');

            $req->execute(array('id_movie' => $movieId));
            while ($data = $req->fetch()) { 
                echo "  <div class='row justify-content-between'>".
                            "<div>".htmlspecialchars($data['firstname'])."</div>".
                            "<div>".htmlspecialchars($data['date']) ."</div>
                        </div>
                        <div class='row'>".
                            "<div>".htmlspecialchars($data['message'])."</div>".
                        "</div>";
                        
                if ($status == "admin") {
                    echo "  <div class='row'>
                        <a class='btn btn-dark' role='button' href='/getflix/API/commenteditapi.php?id_comment=". $data['id_comment']."&movieId=".$data['id_movie']."'>Edit</a>" .
                        "<a class='btn btn-dark'  role='button' href='/getflix/API/commentdeleteapi.php?id_comment=". $data['id_comment']."&movieId=".$data['id_movie']."'>Delete</a>
                    </div>";
                } else if ($_SESSION["id"] == $data['id'] && $status != "admin") {
                    echo "  <div class='row'>
                    <a class='btn btn-dark' role='button' href='/getflix/API/commenteditapi.php?id_comment=". $data['id_comment']."&movieId=".$data['id_movie']."'>Edit</a>" .
                    "<a class='btn btn-dark'  role='button' href='/getflix/API/commentdeleteapi.php?id_comment=". $data['id_comment']."&movieId=".$data['id_movie']."'>Delete</a>
                    </div>";
                }
            }

            if ($status == "admin" || $status == "member") {
                echo '
                <form action = "/getflix/API/commentaddapiscript.php" method = "post">
                    <p><input type="hidden" id="id_author" name="id_author" value="'. $id .'"></p>
                    <p><input type="hidden" id="id" name="movieId" value="'. $_GET['movieId'].'"></p>
                    <p><textarea rows="5" cols="60" id="message" name="message" required></textarea></p>
                    <p><input type="submit" value="Submit"></p>
                </form>';
            }
        
            $req->closeCursor();

            ?>
        </div>
    </div>
</div>
<?php include('/home/dusztsuv/public_html/getflix/home/footer.php');?>
    <!--JS Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

