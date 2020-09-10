<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}

$req = $bdd->query('SELECT id_newsletter, email_newsletter, subscribe, email_hash FROM newsletter');

while ($data = $req->fetch()) {
    if ($data['subscribe']==true){
    $email = htmlspecialchars($data['email_newsletter']);
    $idHash = $data['email_hash'];

    // Sujet
    $subject = $_POST['subject'];
    $messageContent = $_POST['message'];

    // message

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
                '. $messageContent .'
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
                        Want to change how you receive these emails?<br>
                        You can <a style=" color: #dadada;" href="https://netp.becode.go.yj.fr/getflix/dashboard/mail/newsletterunsubscribescript.php?id='.$idHash.'&id_newsletter='.$data['id_newsletter'].'">unsubscribe from this list</a>.
                    </td>
                </tr>
            </tbody>
        </table>


    </body>
    </html>

    ';

    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // En-têtes additionnels

    $headers[] = 'From: N.E.T_P <contact@netp.com>';

    // Envoi
    mail($email, $subject, $message, implode("\r\n", $headers));
    }
}

$req->closeCursor();
header('Location: /getflix/dashboard/dashboard.php');


?>

