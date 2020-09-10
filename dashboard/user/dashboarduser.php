<?php
session_start();
include('/home/dusztsuv/public_html/getflix/scripts/status.php');
if ($status != "admin"){
    header('Location: /getflix/home/home.php');
}
?>
<?php include("/home/dusztsuv/public_html/getflix/home/head.php");?>
    <title>N.E.T_P</title>
</head>
<body>
<?php
$reponse = $bdd->query('SELECT status, id, firstname, lastname, email FROM user ORDER BY id ASC ');
?>
<div class="container-fluid">
<div class="row m-5 justify-content-start align-items-center">
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{ 
echo    

                "<tr><td>"     . htmlspecialchars($donnees['id']) .
                "</td><td>"    . htmlspecialchars($donnees['firstname']) .
                "</td><td>"    . htmlspecialchars($donnees['lastname']) .
                "</td><td>"    . htmlspecialchars($donnees['email']) .
                "</td><td>"    . htmlspecialchars($donnees['status']) .
                "</td><td>"    . "<a class='btn btn-dark' role='button' href='/getflix/dashboard/user/useredit.php?id=". $donnees['id']."'>Edit</a>" .
                "</td><td>"    . "<a class='btn btn-dark'  role='button' href='/getflix/dashboard/user/userdelete.php?id=". $donnees['id']."'>Delete</a>" .
                "</td></tr>"
        ;

}
echo "<a class='btn btn-dark'  role='button' href='/getflix/dashboard/dashboard.php'>Back</a>";
?>
</tbody>
</table>
<a class='btn btn-dark'  role='button' href='/getflix/dashboard/dashboard.php'>Back</a>
</div>
</div>
<?php
$reponse->closeCursor();
?>
<!--JS Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html> 