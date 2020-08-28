<?php  
session_start();
include('/var/www/html/getflix/scripts/status.php'); 

switch($status){

    case "admin":
        echo "<a href='/getflix/dashboard/dashboard.php'>Dashboard</a>";
    case "member":     
        echo    "<a href='/getflix/home/myaccount.php'>My account</a>".
                "<a href='/getflix/home/mylist.php'>My list</a>".
                "<a href='/getflix/sign/disconnect.php'>Sign out</a>";
        break;
    default : echo "<a href='/getflix/index.html'>Sign in/up</a>";
}
?>  
