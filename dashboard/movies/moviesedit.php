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
    <?php
        $id =  htmlspecialchars($_GET["id"]);
        $req = $bdd->prepare('SELECT * FROM movies WHERE id = :id');
        $req->execute(array('id' => $id));
        $result = $req->fetch();
    ?>  

<div class="container-fluid d-flex flex-column">
    <div class="row m-5 justify-content-start">
        <a href="/getflix/home/home.php" class="navbar-brand netp" alt="N.E.T_P"><h1>N.E.T_P</h1></a>    
    </div>
    
    
    <div class="row m-5 justify-content-center flex-column align-items-center title">
        <div class="row m-2 justify-content-center">      
        <h2>User info</h2>
        </div>
        <div class="row m-2 justify-content-center"> 
            <form action = "/getflix/dashboard/movies/movieseditscript.php" method = "post">
                <p><input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>"></p>
                
                <p><label for="title">Title</label> </p>
                <p><input class="form-control form-control-sm" type="text" id="title" name="title" value="<?php echo $result['title'];?>" required></p>

                <p><label for="director">Director</label> </p>
                <p><input class="form-control form-control-sm" type="text" id="director" name="director" value="<?php echo $result['director'];?>" required></p>

                <p><label for="genre">Genre</label> </p>
                <p><input class="form-control form-control-sm"  type="text" id="genre" name="genre" value="<?php echo $result['genre'];?>" required></p>

                <p><label for="year">Year</label> </p>
                <p><input class="form-control form-control-sm"  type="text" id="year" name="year" value="<?php echo $result['year'];?>" required></p>

                <p><label for="length">Length</label> </p>
                <p><input class="form-control form-control-sm"  type="text" id="length" name="length" value="<?php echo $result['length'];?>" required></p>

                <p><label for="synopsis">Synopsis</label> </p>
                <p><textarea class="form-control form-control-sm"  rows="15" cols="40" id="synopsis" name="synopsis"  required><?php echo $result['synopsis'];?></textarea></p>

                <p><label for="rating">Rating</label> </p>
                <p><input class="form-control form-control-sm"  type="number"  min="0" max="10" id="rating" name="rating" value="<?php echo $result['rating'];?>" required></p>
                
                <p><label for="trailer">Trailer</label> </p>
                <p><input class="form-control form-control-sm"  type="text" id="trailer" name="trailer" value="<?php echo $result['trailer'];?>" required></p>
                </p>
                <p><input class="nextButton" type="submit" value="Submit"></p>
            </form>
        </div> 
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>


