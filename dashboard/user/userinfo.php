<?php 
include("/var/www/html/getflix/scripts/connectdb.php");
?>
<!DOCTYPE html>
<html lang = "en">
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      </head>
    <body>
    <?php
        $id =  htmlspecialchars($_GET["id"]);
        $req = $bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute(array('id' => $id));
        $result = $req->fetch();
    ?>  
        <h2>User info</h2>
    <form action = "/getflix/dashboard/user/userinfoscript.php" method = "post">
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
    </body>
</html>
 


