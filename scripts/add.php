<?php
// Three parameters, $table for the table you want to modify, $array for a parameter in the SQL request and $header for the redirection 
function add($table, $array, $header){ 
    include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php"); // Connection to the database
    $param1="";// Declare 2 empty param
    $param2="";
    $key = array_keys($array); // define array $key with key name of $array
    for ($i=0; $i<count($key)-1 ; $i++) { 
            $param1.= $key[$i] . ", ";
    }
    $param1.= $key[count($key)-1] ;  // Setting different $key in the table for exemple : id, firstname, lastname 

    for ($i=0; $i<count($key)-1 ; $i++) {
        $param2.=':'. $key[$i] . ", "; // Setting different $variables id =: id, firstname=: firstname, lastname=: lastname
    }
    $param2.= ':'.$key[count($key)-1] ;

    $sql = 'INSERT INTO '.$table .'('.$param1.') VALUES ('.$param2.')'; // Concat SQL request 
    $req = $bdd->prepare($sql);

    $arrayParam = [];                // Setting array( id => 3, firsname => Thomas, lastname => Depas)
        for ($j=0;$j<count($array);$j++){
        $arrayParam[$key[$j]] = $array[$key[$j]];
    }

    $req->execute($arrayParam); 
    $req->closeCursor();

    // User is redirected
    header('Location: /getflix/'.$header);
}
