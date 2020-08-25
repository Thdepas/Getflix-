<?php
session_start();
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      </head>
    <body>
        <h2>Sign Up</h2>
    <form action = "registerscript.php" method = "post">
            <p><label for="email">Email</label> </p>
            <p><input type="email" id="email" name="email" required></p>
            <p><label for="name">Password</label> </p>
            <p><input type="password" id="password" name="password" required></p>
            <p><label for="name">Confirm Password</label> </p>
            <p><input type="password" id="confirmPassword" name="confirmPassword" required></p>
            <p><input type="submit" value="Submit"></p>
        </form> 
        <script src="passwordvalidation.js"></script>
    </body>
</html>

