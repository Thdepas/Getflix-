<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=mysql-server;dbname=getflix;charset=utf8', 'root','secret');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

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
    // Redirection du visiteur vers la page du minichat
    //header('Location: singUp3.php');
?>



