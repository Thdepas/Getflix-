<?php
include("/home/dusztsuv/public_html/getflix/scripts/add.php"); 

if (isset($_POST["message"]) AND isset($_POST["id_author"]) AND isset($_POST["movieId"])) {
    $table = "comment";
    $header = "movies/movies.php?movieId=".$_POST['movieId'];
    $array = array(
        'message' => $_POST['message'],
        'id_author' => $_POST['id_author'],
        'id_movie' => $_POST['movieId']
        );
   add($table, $array, $header); 
} 
?>