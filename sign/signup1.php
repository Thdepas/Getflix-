<?php 
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      </head>
    <body>
        <h2>Sign Up</h2> 
        <form action = "signup2.php" method = "post">
            <p><label for="firstname">First name</label> </p>
            <p><input type="text" id="firstname" name="firstname" required></p>
            <p><label for="lastname">Last name</label> </p>
            <p><input type="text" id="lastname" name="lastname" required></p>
            <p><input type="submit" value="Next"></p>
        </form> 
    </body>
</html>
 