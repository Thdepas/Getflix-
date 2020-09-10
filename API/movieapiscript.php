<script>
const APIKEY = "63e6eebd5cd444d7bf470e3e3626aa0b";
const baseURL = 'https://api.themoviedb.org/3/';

function checkIfDataExist(data){
    if (data==null){
        data = "NA";
    }
}
async function displayMovieInfo() {
    let movieId = <?php echo $_GET['movieId']; ?>;
    let baseURLImg = "https://image.tmdb.org/t/p/";
    let url = "".concat(baseURL, 'movie/',movieId,'?api_key=', APIKEY, "&language=en-US");
    let data = await fetch(url);
    data = await data.json();

    let urlDirector = "".concat(baseURL, 'movie/',movieId,'/credits?api_key=', APIKEY);
    let dataDirector = await fetch(urlDirector);
    dataDirector = await dataDirector.json();

    let directors = [];
    dataDirector.crew.forEach(function(entry){
        if (entry.job === 'Director') {
            directors.push(entry.name);
        }
    })

    let title = data.original_title;
    checkIfDataExist(title);

    let director;
    if (directors.length<1){
        director = "NA";
    }else {
        director = directors.join(', ');
    }

    let genre;
    if (data.genres.length<1){
        genre = "NA";
    }else {
        genre = data.genres[0].name;
        checkIfDataExist(genre);
    }

    let releasedate = data.release_date;
    checkIfDataExist(releasedate);

    let runtime = data.runtime;
    checkIfDataExist(runtime);

    let rating = data.vote_average;
    checkIfDataExist(rating);

    let synopsis = data.overview;
    checkIfDataExist(synopsis);

    
    let strInfo =
    '<div class="col-lg-3 offset-lg-2 col-md-4 col-sm-12 col-12 text-center p-2"><a href="https://www.youtube.com/results?search_query='+ title +'"><img src="'+baseURLImg+ 'w342' + data.poster_path+'" class="coverMovies" alt="'+ title +' cover"></a></div><div class="col-lg-5 col-md-8 col-sm-12 col-12"><div class="row p-2"><h2>'+ title +'</h2></div><div class="row p-2">Director: '+ director +'</div><div class="row p-2">Genre: '+ genre +'</div><div class="row p-2">Release date: '+ releasedate +'</div><div class="row p-2">Runtime: '+ runtime +'</div><div class="row p-2">Rating: '+ rating +'</div><div class="row p-2">Synopsis: <p class="text-justify">'+ synopsis +'</p></div><div class="row p-2 mt-3 d-flex justify-content-end"><a class="btn btn-dark"  role="button" href="/getflix/home/home.php">Back</a></div></div>';
    

    document.getElementById("movieInfo").innerHTML = strInfo;
    
} 
displayMovieInfo();


</script>
