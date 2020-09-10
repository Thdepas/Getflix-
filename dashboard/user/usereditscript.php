<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
include("/home/dusztsuv/public_html/getflix/scripts/edit.php");

if (isset($_POST["firstname"]) AND isset($_POST["lastname"]) AND isset($_POST["email"]) AND isset($_POST["status"]) ) {
    $table = "user";
    $array = array(
        'id'=> $_POST['id'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => strtolower ($_POST['email']),
        'status' => $_POST['status']
        );
    $header ="dashboard/user/dashboarduser.php";
    edit($table, $array, $header, 'id');
} else {
    echo "Missing informations";
}

?>  
























