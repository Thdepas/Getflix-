<?php
session_start();
include("/home/dusztsuv/public_html/getflix/scripts/delete.php");
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}

$table = "movies";
$id =  htmlspecialchars($_GET["id"]);
$header ="dashboard/movies/dashboardmovies.php?sort=id&order=ASC";

delete($table, $id, $header, 'id');
?>   