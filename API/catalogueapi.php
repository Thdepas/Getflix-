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

//affiche les images
    let divCatalogue = document.getElementById("catalogue");
    let strCatalogue = "";
    for (let k=0;k<posterPath.length;k++){
        if (data.results[k].poster_path!=null){
            strCatalogue += "<a href='/getflix/API/movieapi.php?movieId="+ data.results[k].id + "'><img src='" + posterPath[k] + "' alt='"+ data.results[k].title +"' class='coverCatalogue m-2'></a>";
        } else {
            strCatalogue += "<a href='/getflix/API/movieapi.php?movieId="+ data.results[k].id + "'><div class='noCover m-2'>"+ data.results[k].title +"</div></a>";
    }
    divCatalogue.innerHTML ="";
    divCatalogue.innerHTML = strCatalogue;
    }
}
displayCatalogue("w342", <?php echo $_GET['page']; ?>);

</script>

