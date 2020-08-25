<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=mysql-server;dbname=getflix;charset=utf8', 'root', 'secret');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>