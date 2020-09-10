<?php

include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");
$id_comment =  htmlspecialchars($_GET["id_comment"]);
$sql = 'DELETE FROM comment WHERE id_comment = :id_comment';
$req = $bdd->prepare($sql);
$req->execute(array('id_comment' => $id_comment));
$req->closeCursor();

header("Location: /getflix/movies/movies.php?movieId=".$_GET["movieId"]);



