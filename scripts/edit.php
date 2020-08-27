<?php
function edit($table, $array, $header) {
include("/var/www/html/getflix/scripts/connectdb.php");

$param="";
$key = array_keys($array);
    for ($i=1; $i<count($key)-1 ; $i++) {
        $param.= $key[$i] . "=:" . $key[$i].", ";
}
$param.= $key[count($key)-1] . "=:" . $key[count($key)-1];
$sql = 'UPDATE '.$table.' SET '.$param.'  WHERE id =:id';
$req = $bdd->prepare($sql);

$arrayParam = [];
    for ($j=0;$j<count($array);$j++){
        $arrayParam[$key[$j]] = $array[$key[$j]];
}
$req->execute($arrayParam);
$req->closeCursor();

header("Location: /getflix/" . $header);
}

