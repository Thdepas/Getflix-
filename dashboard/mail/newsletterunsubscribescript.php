<?php
include("/home/dusztsuv/public_html/getflix/scripts/edit.php");
    $table = "newsletter";
    $array = array(
        'id_newsletter'=> $_GET['id_newsletter'],
        'subscribe' => false,
        'email_hash'=> $_GET['id']
        );
    $header ="home/newsletterunsubscribe.php";
    edit($table, $array, $header, 'email_hash');
?>    