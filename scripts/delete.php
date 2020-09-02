<?php
function delete($table, $id, $header, $idFieldName) {
include("/var/www/html/getflix/scripts/connectdb.php");

$sql = 'DELETE FROM ' . $table . ' WHERE '.$idFieldName.' = :'.$idFieldName;
$req = $bdd->prepare($sql);
$req->execute(array('id' => $id));
$req->closeCursor();

header("Location: /getflix/" . $header);
}
