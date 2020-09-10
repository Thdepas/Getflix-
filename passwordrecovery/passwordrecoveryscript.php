<?php
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php"); // Connect to the database
$exist=false;
$req = $bdd->query('SELECT email FROM user'); // Request SQL 
while($data = $req->fetch()){                  
    
    if ($_POST['email']==htmlspecialchars($data['email'])) {  // If email is set and match email in database 
        $exist = true;
        $req->closeCursor();
        $req = $bdd->prepare('SELECT id, email FROM user WHERE email=:email'); // Request SQL id and email
        $req->execute(array('email' => strtolower ($_POST['email']))); // Remove uppercase
        $data = $req->fetch();
        $email = htmlspecialchars($data['email']);               // Remove tag  
        $idHash = password_hash($data['id'], PASSWORD_DEFAULT); // Hash id  

         // Subjet
        $subject = "Password recovery";
        $messageContent = "Click on this link to reset your password: ";

        // Message to send by mail 

        $message = ' 

        <html>

        <head>
            <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        </head>

        <body style="font-family: Arial, Helvetica, sans-serif; margin: 0px; background-color: #1f1f1f; color : #dadada;">
            <header style="margin: 15px;">
                <a style="color : #dadada !important;text-decoration:none;"
                    href="https://netp.becode.go.yj.fr/getflix/home/home.php" alt="N.E.T_P">
                    <h1 style="font-size: 45px;font-family: " Bebas Neue", cursive; letter-spacing: 5px; text-shadow: #00ff00rgb(22, 22, 22);
                        0px 0px 5px;">N.E.T_P</h1>
                </a>
            </header>
            <div style="margin: 15px;">
                <div style="width: 60%; text-align: justify; margin: 0px auto">
                    <h2>'. $subject .'</h2>
                    '. $messageContent .' <a href="https://netp.becode.go.yj.fr/getflix/passwordrecovery/newpassword.php?id='.$idHash.'">Follow this link.</a>
                </div>  
            </div>
            <table style="padding: 20px; color: #6d6d6d; text-align: center; width:60%; margin: 0px auto; background-color: rgb(22, 22, 22);">
                <tbody>
                    <tr>
                        <td style="font-size: 11px;padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">

                            <em>Copyright © 2050 N.E.T_P, All rights reserved.</em><br>
                            N.E.T_P Newsletter<br>
                            <br>
                            <strong>Our mailing address is:</strong><br>
                            contact@netp.com<br>
                            <br>
                            
                            
                        </td>
                    </tr>
                </tbody>
            </table>


        </body>
        </html>

        ';

        // User has to click on the link to reset the password

        // To send a message, the content-type in the header must be defined 

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Header 

        $headers[] = 'From: N.E.T_P <contact@netp.com>';

        // Send 

        mail($email, $subject, $message, implode("\r\n", $headers)); // Implode make a string with every element of the headers 

        $req->closeCursor();
        // Redirection
        header('Location: /getflix/passwordrecovery/passwordemailconfirm.php');
} 
} 
if ($exist==false){ 
    echo "Wrong email address";
}

?>

