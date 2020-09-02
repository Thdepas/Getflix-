<?php
session_start();
include('/var/www/html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
include("/var/www/html/getflix/scripts/edit.php");

if (isset($_POST["firstname"]) AND isset($_POST["lastname"]) AND isset($_POST["email"]) AND isset($_POST["status"]) ) {
    $table = "user";
    $array = array(
        'id'=> $_POST['id'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'status' => $_POST['status']
        );
    $header ="dashboard/user/dashboarduser.php";
    edit($table, $array, $header);
} else {
    echo "Missing informations";
}

?>  
























