<?php include("/home/dusztsuv/public_html/getflix/home/head.php");?>
    <title>N.E.T_P</title>
</head>
<body>
        <?php
        include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php"); // 
        include('/home/dusztsuv/public_html/getflix/home/navbar.php');
        ?>
    <div class="row m-5 justify-content-center flex-column align-items-center">
        <div class="row m-2 justify-content-center">   
            <?php
            $id_comment =  htmlspecialchars($_GET["id_comment"]);
            $req = $bdd->prepare('SELECT * FROM comment WHERE id_comment = :id_comment');
            $req->execute(array('id_comment' => $id_comment));
            $result = $req->fetch();
        ?>  
            <form action = "/getflix/API/commenteditapiscript.php" method = "post">
                <p><input type="hidden" id="id_comment" name="id_comment" value="<?php echo $result['id_comment'];?>"></p>
                <p><input type="hidden" id="movieId" name="movieId" value="<?php echo $result['id_movie'];?>"></p>
                <p><label for="message">Comment</label> </p>
                <p><textarea rows="5" cols="60" id="message" name="message"  required><?php echo $result['message'];?></textarea></p>
                <p><input type="submit" value="Submit"></p>
            </form> 
        </div>
    </div>
    <?php include('/home/dusztsuv/public_html/getflix/home/footer.php');?>
    <!--JS Scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>