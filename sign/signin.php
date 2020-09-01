<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/getflix/css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

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