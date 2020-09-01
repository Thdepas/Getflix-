<?php 
include("/var/www/html/getflix/scripts/connectdb.php");
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <?php
        $id_comment =  htmlspecialchars($_GET["id_comment"]);
        $req = $bdd->prepare('SELECT * FROM comment WHERE id_comment = :id_comment');
        $req->execute(array('id_comment' => $id_comment));
        $result = $req->fetch();
    ?>  
        <h2>User info</h2>
        <form action = "/getflix/comment/commenteditscript.php" method = "post">
            <p><input type="hidden" id="id_comment" name="id_comment" value="<?php echo $result['id_comment'];?>"></p>
            <p><input type="hidden" id="movieId" name="movieId" value="<?php echo $result['id_movie'];?>"></p>
            <p><label for="message">Comment</label> </p>
            <p><textarea rows="5" cols="60" id="message" name="message"  required><?php echo $result['message'];?></textarea></p>
            <p><input type="submit" value="Submit"></p>
        </form> 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>


