<script>
const APIKEY = "63e6eebd5cd444d7bf470e3e3626aa0b";
const baseURL = 'https://api.themoviedb.org/3/';

async function displayCatalogue(posterSize, pageNbr) {
    
    let baseURLImg = "https://image.tmdb.org/t/p/";
    let sort = "&language=en-US&sort_by=primary_release_date.desc&certification_country=US&include_adult=false&include_video=false&page="+ pageNbr +"&primary_release_date.lte=2020-09-09";
    let url = "".concat(baseURL, 'discover/movie?api_key=', APIKEY, sort);
    let data = await fetch(url);
    data = await data.json();
    let posterPath=[];
    for (let i=0;i<=19;i++){
            posterPath.push(baseURLImg.concat(posterSize, data.results[i].poster_path)); 
    }
                                                                                //Display images
    let divCarouselAPI = document.getElementById("carouselAPI");
    let strCarousel = "";
    for (let k=0;k<posterPath.length;k++){
        if (data.results[k].poster_path!=null){
            strCarousel += '<div class="swiper-slide"><a href="/getflix/API/movieapi.php?movieId=' + data.results[k].id +  '" alt="'+ data.results[k].title +'"><img style="width:207px; height:317px;"src="'+ posterPath[k] +'" alt="'+ data.results[k].title +' cover"></a></div>';

        }
    divCarouselAPI.innerHTML ="";
    divCarouselAPI.innerHTML = strCarousel;
    }
}
displayCatalogue("w342", 1);

</script>