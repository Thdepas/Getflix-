<?php
session_start();
include('/var/www/html/getflix/scripts/status.php'); 

switch($status){
    case "member":     
        echo    "<a href='/getflix/'>My account</a>".
                "<a href='/getflix/'>My list</a>".
                "<a href='/getflix/'>Sign out</a>";
    case "admin":
        echo "<a href=''>Dashboard</a>";
        break;
    default : echo "<a href='/getflix/index.html'>Sign in/up</a>";
}

?>