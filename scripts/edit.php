<?php
function edit($table, $array, $header, $idFieldName) {                                  // setting parameters for the function
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");                    // Connecting database

$param="";                                               // table fields to edit  
$key = array_keys($array);                    
    for ($i=1; $i<count($key)-1 ; $i++) {                // Setting different $variables id =: id, firstname=: firstname, lastname=: lastname
        $param.= $key[$i] . "=:" . $key[$i].", ";
}
$param.= $key[count($key)-1] . "=:" . $key[count($key)-1]; 
$sql = 'UPDATE '.$table.' SET '.$param.'  WHERE '.$idFieldName.' =:'.$idFieldName;      // SQL request 
$req = $bdd->prepare($sql);

$arrayParam = [];                                        // Setting array( id => 3, firsname => Thomas, lastname => Depas)
    for ($j=0;$j<count($array);$j++){
        $arrayParam[$key[$j]] = $array[$key[$j]];
}
$req->execute($arrayParam);
$req->closeCursor();

header("Location: /getflix/" . $header);                // User is redirected

}

