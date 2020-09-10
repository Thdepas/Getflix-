<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
include("/home/dusztsuv/public_html/getflix/scripts/delete.php");

$table = "newsletter";
$id =  htmlspecialchars($_GET["id_newsletter"]);
$header ="dashboard/mail/dashboardnewsletter.php";

delete($table, $id, $header, 'id_newsletter');
?>   