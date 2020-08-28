<?php
session_start(); 
include("/var/www/html/getflix/scripts/add.php"); 
$defaultStatus = "member";

if (isset($_SESSION["firstname"]) AND isset($_SESSION["lastname"]) AND isset($_POST["email"]) AND isset($_POST["password"])) {
    $table = "user";
    $header = "sign/signup3.php";
    $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $array = array(
        'firstname' => $_SESSION["firstname"],
        'lastname' => $_SESSION["lastname"],
        'email' => $_POST["email"],
        'password' => $passHash,
        'status' => $defaultStatus
        );

    add($table, $array, $header); 
} else { echo "Missing informations";}


?>