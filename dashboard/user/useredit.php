<?php 
include("/var/www/html/getflix/scripts/connectdb.php");
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <?php
        $id =  htmlspecialchars($_GET["id"]);
        $req = $bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute(array('id' => $id));
        $result = $req->fetch();
    ?>  
        <h2>User info</h2>
    <form action = "/getflix/dashboard/user/usereditscript.php" method = "post">
            <p><input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>"></p>
            <p><label for="firstname">Firstname</label> </p>
            <p><input type="text" id="fisrtname" name="firstname" value="<?php echo $result['firstname'];?>" required></p>

            <p><label for="lastname">Lastname</label> </p>
            <p><input type="text" id="password" name="lastname" value="<?php echo $result['lastname'];?>" required></p>

            <p><label for="email">Email</label> </p>
            <p><input type="text" id="email" name="email" value="<?php echo $result['email'];?>" required></p>

            <p><label for="status">Status</label> </p>
            <p><select id="status" name="status">

                <?php if($result['status']=="admin") {
                    echo '<option value="admin" selected>Admin</option>
                          <option value="member" >Member</option>';
                }else { echo '<option value="admin">Admin</option>
                              <option value="member" selected >Member</option>'; }
                ?>
                
                
            </select></p>
            <p><input type="submit" value="Submit"></p>
        </form> 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
 


