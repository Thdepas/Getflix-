<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
include("/home/dusztsuv/public_html/getflix/scripts/edit.php");

if (isset($_POST["email_newsletter"]) AND isset($_POST["subscribe"] ) ) {
    $table = "newsletter";
    $array = array(
        'id_newsletter'=> $_POST['id_newsletter'],
        'email_newsletter' => strtolower ($_POST['email_newsletter']),
        'subscribe' => $_POST['subscribe'],
        'email_hash' => password_hash(strtolower ($_POST['email_newsletter']), PASSWORD_DEFAULT)
        );
    $header ="dashboard/mail/dashboardnewsletter.php";
    edit($table, $array, $header, 'id_newsletter');
} else {
    echo "Missing informations";
}

?>  
























