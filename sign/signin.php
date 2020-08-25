<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to N.E.T_P !</title>
</head>
<body>
<h2>Sign In</h2>
<form action = "signinscript.php" method = "post">
            <p><label for="email">Email</label> </p>
            <p><input type="email" id="email" name="email" required></p>
            <p><label for="name">Password</label> </p>
            <p><input type="password" id="password" name="password" required></p>
            <p><input type="submit" value="Submit"></p>
        </form>
</body>
</html>