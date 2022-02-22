<?php
    namespace DAO;

    use Models\Movie as Movie;
    use Models\Movie_Genre as Movie_Genre;
    use DAO\MovieDB as MovieDB;
    class ApiDB
    {
        private $tableName = 'movies';

        public function updateMovies()
        {
            
            $moviesURL = BASE_API_URL."movie/now_playing?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";
           
            $moviesJSON = file_get_contents($moviesURL);
            $movies = json_decode($moviesJSON,true);

            return $movies;
        }
        
        public function updateGenres(){
            $genresURL = BASE_API_URL."genre/movie/list?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";
            
            $genreJSON = file_get_contents($genresURL);
            $genres = json_decode($genreJSON,true);

            return $genres;
        }
    }

?>
