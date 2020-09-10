<?php
session_start(); 
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php");                 // Connection to database
include("/home/dusztsuv/public_html/getflix/scripts/add.php");                       // including add script
$defaultStatus = "member";

if ($_POST['newsletter']=="isSubscribed") {                                          // Check if newsletter is subscribed is set

 
    if (isset($_POST["newsletter"])) {                                               // Check if newsletter is set
        $exist = false;
        $req = $bdd->query('SELECT email_newsletter, subscribe FROM newsletter');    // SQL request 
        
        while ($data = $req->fetch()) {                                             
            if (strtolower ($_POST["email"]) == $data['email_newsletter']){          
            $exist =true;
            $emailExist = $data['email_newsletter'];
            }
        }
        
        $req->closeCursor();
    
        $req = $bdd->prepare('SELECT subscribe FROM newsletter WHERE email_newsletter = :email_newsletter'); // Prepare SQL request
        $req->execute(array('email_newsletter' => $emailExist));    
        $data = $req->fetch();
        if ($exist == true && $data['subscribe'] == false){    // Checks if email already exists 
            echo "subscribe:" . $data['subscribe'];         
            $req->closeCursor();
            $req = $bdd->prepare('UPDATE newsletter SET subscribe =:subscribe WHERE email_newsletter =:email_newsletter'); // If email doesn't exist, email updated in database
            $req->execute(array('subscribe' => true,
                                'email_newsletter' => $_POST["email"]));
            $req->closeCursor();
            header('Location: /getflix/home/newsletterconfirm.php');
        } else if ($exist!=true) {            // If value is different than true, fill 3 values : 'email_newsletter', 'subscribe', 'email_hash'
            $req->closeCursor();
            $req = $bdd->prepare('INSERT INTO newsletter (email_newsletter, subscribe, email_hash) VALUES(:email_newsletter, :subscribe, :email_hash)');
            $req->execute(array(
                'email_newsletter' => $_POST['email'], 
                'subscribe' => true,
                'email_hash' => password_hash($_POST['email'], PASSWORD_DEFAULT)
            ));
            $req->closeCursor();

        } else {
            $req->closeCursor();

    
        }
    }
  
}

if (isset($_SESSION["firstname"]) AND isset($_SESSION["lastname"]) AND isset($_POST["email"]) AND isset($_POST["password"])) {
    $exist = false;
    $req = $bdd->query('SELECT email FROM user');
    
    while ($data = $req->fetch()) {
        if ($_POST["email"] == $data['email']){
        echo "<p>user already exist</p>   
        <p><a href='/getflix/index.html'>Back</a></p>";
        $exist =true;
        }
    }
    $req->closeCursor();

    if ($exist!=true) {
    $table = "user";
    $header = "sign/signup3.php";
    $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $array = array(
        'firstname' => $_SESSION["firstname"],
        'lastname' => $_SESSION["lastname"],
        'email' => strtolower ($_POST["email"]),
        'password' => $passHash,
        'status' => $defaultStatus
        );

    add($table, $array, $header);

    


    }
} else { echo "Missing informations";}



?>