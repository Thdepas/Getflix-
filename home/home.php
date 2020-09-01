<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/getflix/css/carousel.css" />
    <link rel="stylesheet" href="/getflix/css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <title>N.E.T_P</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include('/var/www/html/getflix/home/navbar.php');
 
        function makeSwiper($nbrOfCover, $sort, $swiperName) {
            include("/var/www/html/getflix/scripts/connectdb.php");
            $sql = 'SELECT id, title FROM movies ORDER BY ' . $sort . ' DESC LIMIT ' . $nbrOfCover;
            $req = $bdd->prepare($sql);
            $req->execute();

            $printSwiper = '
            <div class="netflix-slider mb-3">
                <h2 class="mb-0">'.$swiperName.'</h2>
                <div class="swiper-container py-3">
                    <div class="swiper-wrapper">';

            while ($result = $req->fetch()) {  
            $printSwiper .= '
                        <div class="swiper-slide">
                            <a href="/getflix/movies/movies.php?movieId=' . $result['id'] . '" alt="'.$result['title'].'">
                                <img src="/getflix/img/cover/'.$result['id'].'.jpg" alt="'.$result['title'].' cover">
                            </a>
                        </div>';
            }

            $printSwiper .= '
                    </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                </div>
            </div>';
            
            echo $printSwiper;
        }

        makeSwiper(12, "id", "Top picks for you");
        makeSwiper(12, "rating", "Trending now");
        makeSwiper(12, "year", "New releases");
        ?>

    </div>

    <!--JS Scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="/getflix/scripts/carouselscript.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/getflix/scripts/swiperini.js"></script>

</body>

</html>