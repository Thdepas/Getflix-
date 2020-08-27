<?php
include("/var/www/html/getflix/scripts/delete.php");

$table = "user";
$id =  htmlspecialchars($_GET["id"]);
$header ="dashboard/user/dashboarduser.php";

delete($table, $id, $header);
?>   