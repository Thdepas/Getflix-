<?php
session_start();
include("/var/www/html/getflix/scripts/connectdb.php"); 
$defaultStatus = "member";

if (isset($_SESSION["firstname"]) AND isset($_SESSION["lastname"]) AND isset($_POST["email"]) AND isset($_POST["password"])) {
$passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$req = $bdd->prepare('INSERT INTO user (firstname, lastname, email, password, status) VALUES(:firstname, :lastname, :email, :password, :status)');
$req->execute(array(
    'firstname' => $_SESSION["firstname"],
    'lastname' => $_SESSION["lastname"],
    'email' => $_POST["email"],
    'password' => $passHash,
    'status' => $defaultStatus
    ));
    $req->closeCursor();
}
    // Redirection du visiteur 
    header('Location: /getflix/sign/signup3.php');
?>
 


