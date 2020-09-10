<?php 

include("/home/dusztsuv/public_html/getflix/scripts/edit.php");           // load edit script 
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");      // Connect to database

if (isset($_POST["password"]) AND isset($_POST["confirmPassword"])) {     // Check if password and passwordconfirmation is set 

    $req = $bdd->query('SELECT id FROM user');                            // SQL request 
    
    while($data = $req->fetch()){           
        if (password_verify($data['id'], $_GET['id'])) {  
            $id = $data['id'];
        }
    }
    $req->closeCursor();   // Define parameters for edit function
    $table = "user";
    $array = array(
        'id'=> $id,
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)  // Password hash
        );
    $header ="passwordrecovery/passwordresetconfirm.php"; 

    edit($table, $array, $header, 'id'); 
} else {                                 // If missing input
    echo "Missing informations";
}
?>