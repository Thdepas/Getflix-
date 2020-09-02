<?php
include("/var/www/html/getflix/home/head.php");
?>

    <title>Welcome to N.E.T_P !</title>
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
                <form action = "signinscript.php" method = "post">
                    <p><label for="email">Email</label> </p>
                    <p><input class="form-control form-control-sm"  type="email" id="email" name="email" required></p>
                    <p><label for="name">Password</label> </p>
                    <p><input class="form-control form-control-sm"  type="password" id="password" name="password" required></p>
                    <p><input class="nextButton" type="submit" value="Submit"></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 