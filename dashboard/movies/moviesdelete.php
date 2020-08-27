<?php
include("/var/www/html/getflix/scripts/delete.php");

$table = "movies";
$id =  htmlspecialchars($_GET["id"]);
$header ="dashboard/movies/dashboardmovies.php";

delete($table, $id, $header);
?>   