<?php
session_start();
include("/var/www/html/getflix/scripts/delete.php");
include('/var/www/html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}

$table = "movies";
$id =  htmlspecialchars($_GET["id"]);
$header ="dashboard/movies/dashboardmovies.php?sort=id&order=ASC";

delete($table, $id, $header);
?>   