<?php
function add($table, $array, $header){
    include("/var/www/html/getflix/scripts/connectdb.php"); 
    $key = array_keys($array);
    $param1="";
    $param2="";
    $key = array_keys($array);
    for ($i=0; $i<count($key)-1 ; $i++) {
            $param1.= $key[$i] . ", ";
    }
    $param1.= $key[count($key)-1] ;

    for ($i=0; $i<count($key)-1 ; $i++) {
        $param2.=':'. $key[$i] . ", ";
    }
    $param2.= ':'.$key[count($key)-1] ;

    $sql = 'INSERT INTO '.$table .'('.$param1.') VALUES ('.$param2.')';
    $req = $bdd->prepare($sql);

    $arrayParam = [];
        for ($j=0;$j<count($array);$j++){
        $arrayParam[$key[$j]] = $array[$key[$j]];
    }

    $req->execute($arrayParam);
    $req->closeCursor();

    // Redirection du visiteur 
    header('Location: /getflix/'.$header);
}
