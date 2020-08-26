<?php
include("/var/www/html/getflix/scripts/connectdb.php");
$status = "guest";
if ($_SESSION['id'] == NULL) {
} else { 
    $id = $_SESSION["id"];
    $req = $bdd->prepare('SELECT id, status FROM user WHERE id = :id');
    $req->execute(array('id' => $id));
    $result = $req->fetch();
    if ($result['status']=='member'){
        $status = "member";
    }else{
        $status = "admin";
    }
} 
