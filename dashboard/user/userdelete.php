<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
include("/home/dusztsuv/public_html/getflix/scripts/delete.php");

$table = "user";
$id =  htmlspecialchars($_GET["id"]);
$header ="dashboard/user/dashboarduser.php";

delete($table, $id, $header, 'id');
?>   