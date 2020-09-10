<?php
session_start(); 
// Connection to database
include("/home/dusztsuv/public_html/getflix/scripts/connectdb.php"); 

// Check if email and password are set
if(isset($_POST["email"], $_POST["password"])) 
    {    
        $email = $_POST["email"];
        $req = $bdd->prepare('SELECT id, email, password FROM user WHERE email = :email');  // prepare the request 
        $req->execute(array('email' => $email)); //execute the SQL request with $email variable 
        $result = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']); //set $isPasswordCorrect = $_POST 'password' is hash than compared with $result 'password' in the database
        if (!$result) // condition
        {
            echo 'Wrong email & password!';
        }
        else
        {   // if its matching $variable are defined and the user is redirected to new location
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $result['id']; 
                $_SESSION['email'] = $result['email'] ; 
                header('Location: /getflix/home/home.php');
            }
            else {
                echo 'Wrong email or password !!';
            }
        }
    }
 
?>

 