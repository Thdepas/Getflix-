<?php
include("/var/www/html/getflix/scripts/connectdb.php"); 
//echo getcwd();

if(isset($_POST["email"], $_POST["password"])) 
    {    
        $email = $_POST["email"];
        $req = $bdd->prepare('SELECT id, email, password FROM user WHERE email = :email');
        $req->execute(array('email' => $email));
        $result = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']);
        
        if (!$result)
        {
            echo 'Wrong email & password!';
        }
        else
        {
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['email'] = $result['email'] ;
                header('Location: /var/www/html/getflix/home/home.php');
            }
            else {
                echo 'Wrong email or password !!';
            }
        }
    }
 
?>

