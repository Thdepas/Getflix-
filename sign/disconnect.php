<?php 
session_start(); 

// Session's variables and session deletion
$_SESSION = array();
session_destroy();

// Visitor redirection 
header('Location: /getflix/home/home.php');

//Automatic cookie deletion 
//setcookie('login', '');
//setcookie('pass_hache', '');
?>  