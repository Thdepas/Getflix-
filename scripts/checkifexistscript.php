<?php
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php"); // Connection to the database
if (isset($_POST["email_newsletter"])) {                             // Check if email_newsletter is set
    $exist = false; 
    $req = $bdd->query('SELECT email_newsletter, subscribe FROM newsletter'); // SQL select request
    
    while ($data = $req->fetch()) {                                           // Compare email to all emails in the database
        if (strtolower ($_POST["email_newsletter"])== $data['email_newsletter']){
        $exist =true;
        $emailExist = $data['email_newsletter'];
        }
    }
    
    $req->closeCursor();

    $req = $bdd->prepare('SELECT subscribe FROM newsletter WHERE email_newsletter = :email_newsletter'); // Retreive informations from newsletter 'Boolean'
    $req->execute(array('email_newsletter' => $emailExist));
    $data = $req->fetch();
   
    if ($exist ==true && $data['subscribe'] == false ){ // if exist and not subscribe ...
        echo "subscribe:" . $data['subscribe'];
        $req->closeCursor();
        $req = $bdd->prepare('UPDATE newsletter SET subscribe =:subscribe WHERE email_newsletter =:email_newsletter'); // SQL request for DB modification adding to newsletter
        $req->execute(array('subscribe' => true,
                            'email_newsletter' => strtolower ($_POST["email_newsletter"])));
        $req->closeCursor();
        header('Location: /getflix/home/newsletterconfirm.php'); // Relocation
    } else if ($exist!=true) {
        $req->closeCursor();
        $req = $bdd->prepare('INSERT INTO newsletter (email_newsletter, subscribe, email_hash) VALUES(:email_newsletter, :subscribe, :email_hash)'); // SQL request adding to DB and to newsletter
        $req->execute(array(
            'email_newsletter' => strtolower ($_POST['email_newsletter']), 
            'subscribe' => true,
            'email_hash' => password_hash(strtolower ($_POST['email_newsletter']), PASSWORD_DEFAULT)
        ));
        $req->closeCursor();
        header('Location: /getflix/home/newsletterconfirm.php'); // Relocation
    } else {
        $req->closeCursor();
        header('Location: /getflix/home/alreadyexist.php'); // Relocation

    }
}
?>