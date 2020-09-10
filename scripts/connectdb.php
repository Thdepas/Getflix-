<?php
try
{
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=dusztsuv_getflix;charset=utf8','dusztsuv_netp', '123Banane!');              // Connecting to database

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
} 