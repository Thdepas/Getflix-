<?php  
include('/var/www/html/getflix/scripts/status.php');
?>

<nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
        <a href="/getflix/home/home.php" class="navbar-brand" alt="N.E.T_P"><h1>N.E.T_P</h1></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between px-5" id="navbarCollapse">
            <div class="navbar-nav menuLink">
                <a href="/getflix/catalogue/catalogue.php" class="nav-item nav-link active">Catalogue</a>
            </div>
            <div class="navbar-nav">
                <form class="form-inline" action = "/getflix/scripts/search.php" method = "post">
                    <div class="input-group">  
                        <label for="search"><img src="/getflix/img/icon/search.svg" class="mr-2"></label>
                        <input type="text" id="search" name="search" placeholder="search" required>
                        <input type="submit" id="searchSubmit" value="Search"> 
                    </div>
                </form>

                <?php
                if ($status == "admin" || $status == "member") {
                    echo '
                    <div class="nav-item dropdown accountLink">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="/getflix/img/icon/account.svg" class="mr-1" alt="My account">'.$result["firstname"].' '.$result["lastname"].
                        '</a>
                        <div class="dropdown-menu">';
                    switch($status){
                        case "admin":
                            echo "<a class='dropdown-item' href='/getflix/dashboard/dashboard.php'>Dashboard</a>";
                        case "member":     
                            echo    "<a class='dropdown-item' href='/getflix/home/myaccount.php'>My account</a>".
                                    "<a class='dropdown-item' href='/getflix/home/mylist.php'>My list</a>".
                                    "<a class='dropdown-item' href='/getflix/sign/disconnect.php'>Sign out</a>";
                            break;
                        default : echo "<a class='dropdown-item' href='/getflix/index.html'>Sign in/up</a>";
                    }
                    echo '
                        </div>
                    </div>';
                    
                    } else { 
                        echo '<a href="/getflix/index.html" class="nav-link accountLink">
                                <img src="/getflix/img/icon/account.svg" class="mr-1" alt="Sign in/up">Sign in/up
                              </a>'; 
                    }

                ?>
        
                    
            </div>
        </div>
    </nav>