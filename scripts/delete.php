<?php
function delete($table, $id, $header, $idFieldName) {
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");

$sql = 'DELETE FROM ' . $table . ' WHERE '.$idFieldName.' = :'.$idFieldName;
$req = $bdd->prepare($sql);
$req->execute(array($idFieldName => $id));
$req->closeCursor();

header("Location: /getflix/" . $header);
}
