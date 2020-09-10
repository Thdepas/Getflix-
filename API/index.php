<?php include("/home/dusztsuv/public_html/getflix/home/head.php");?>
    <title>N.E.T_P</title>
</head>
<body>
        <?php
        include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");
        include('/home/dusztsuv/public_html/getflix/home/navbar.php');
        ?>
    <div class="container-fluid">
        <div>
            <form action="/getflix/API/index.php" method="get">
                <select class="form-control form-control-sm m-auto" id="page" name="page"  onchange="this.form.submit();">
                    <?php
                    for ($i=1;$i<41;$i++) {
                        if ($_GET['page']==$i){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        } else {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>        
                </select>
            </form>
        </div>
        <div class="row m-5 justify-content-center" id="catalogue">
        <?php 
            include('/home/dusztsuv/public_html/getflix/API/catalogueapi.php');?>
        </div>
        <div>
            <form action="/getflix/API/index.php" method="get">
                <select class="form-control form-control-sm m-auto" id="page" name="page"  onchange="this.form.submit();">
                    <?php
                    for ($i=1;$i<41;$i++) {
                        if ($_GET['page']==$i){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        } else {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>        
                </select>
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