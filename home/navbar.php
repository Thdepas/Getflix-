<?php
session_start();
include('/var/www/html/getflix/scripts/status.php'); 
<<<<<<< HEAD
switch($status){

    case "admin":
        echo "<a href='/getflix/home/dashboard.php'>Dashboard</a>";
    case "member":     
        echo    "<a href='/getflix/home/myaccount.php'>My account</a>".
                "<a href='/getflix/home/mylist.php'>My list</a>".
                "<a href='/getflix/sign/disconnect.php'>Sign out</a>";
=======

switch($status){
    case "member":     
        echo    "<a href='/getflix/'>My account</a>".
                "<a href='/getflix/'>My list</a>".
                "<a href='/getflix/'>Sign out</a>";
    case "admin":
        echo "<a href=''>Dashboard</a>";
>>>>>>> 753afef5f46c17868cd07dd19cf5bc8a974aad50
        break;
    default : echo "<a href='/getflix/index.html'>Sign in/up</a>";
}

<<<<<<< HEAD
?>  
=======
?>
>>>>>>> 753afef5f46c17868cd07dd19cf5bc8a974aad50
