<?php
namespace Controllers;

use DAO\HelperDB as HelperDB;
use DAO\ApiDB as ApiDB;
use DAO\MovieDB as MovieDB;
use DAO\GenreXmovieDB as GenreXmovieDB;
use Models\Movie as Movie;
use Models\GenreXmovie as GenreXmovie;
use Models\Movie_Genre as Movie_Genre;
use DAO\Movie_genreDB as Movie_genreDB;

class MovieController 
{
    private $apiDB;
    private $movieDB;
    private $genreXmovie;
    private $genreXmovieDB;
    private $helperDB;
    private $movie_genreDB;

    public function __construct()
    {
        $this->apiDB = new ApiDB();
        $this->movieDB = new MovieDB();
        $this->genreXmovie = new GenreXmovie;
        $this->genreXmovieDB = new GenreXmovieDB;
        $this->helperDB = new HelperDB();
        $this->movie_genreDB = new Movie_genreDB;

    }

    /*private function getMoviesFromAPI(){
        $nowPlayingURL = BASE_API_URL."movie/now_playing?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";
        $movieList = array();
        foreach($this->nowPlayingURL as $valuesArray)
            {
                $movie = new Movie;
                $movie = setID($valuesArray["id"]);
                $movie = setBackdrop_paht($valuesArray["backdrop_path"]);
                $movie = setOriginal_language($valuesArray["original_language"]);
                $movie = setOriginal_title($valuesArray["original_title"]);
                $movie = setVote_average($valuesArray["vote_average"]);
                $movie = setRelease_date($valuesArray["release_date"]);
                $movie = setOverview($valuesArray["overview"]);

                array_push($movieList, $movie);
            }
            return $movieList;
    }*/
    public function Update(){
        $genreList = $this->UpdateGenres();
        $movieList = $this->apiDB->updateMovies();
        
        if($movieList != null){
            foreach($movieList['results'] as $row){

                if (!$this->movieDB->MovieExist($row['id'])){
                $movie = new Movie;
                $movie->setId($row['id']);
                $movie->setBackdrop_path($row['backdrop_path']);
                $movie->setOriginal_title($row['original_title']);
                $movie->setVote_average($row['vote_average']);
                $movie->setRelease_date($row['release_date']);
                $movie->setOverview($row['overview']);
                
                $this->movieDB->addMovie($movie);
                
                foreach($row['genre_ids'] as $genre)
                {  
                    $genreXmovie = new GenreXmovie; 
                    $genreXmovie->setId_genre($genre);
                    $genreXmovie->setId_movie($movie->getId());
                    $this->genreXmovieDB->addGenreXmovie($genreXmovie);
                }
            }
            }
            $this->showMovieViews();
        }
        
    }

    public function UpdateGenres(){
        $genreList =$this->apiDB->updateGenres();

        if($genreList != null){
  
            foreach($genreList['genres'] as $row){
                
                if (!$this->movie_genreDB->genreExist($row['id'])){
                $genre = new Movie_Genre();
                $genre->setGenreId($row['id']);
                $genre->setGenreType($row['name']);                
                    
                
                $this->movie_genreDB->addGenre($genre);
                
                
                }
            } 
        }  
    }

    public function showMovieViews()
    {
        $movieList=$this->helperDB->GetMovieAll();
        require_once(VIEWS_PATH."movie-list.php");

    }
    public function showBillBoard()
    {
        $movieList=$this->helperDB->GetMovieWithFunction();
        $genreList=$this->helperDB->GetGenreAll();
        require_once(VIEWS_PATH."show-billboard.php");

    }
    public function showBillBoardByDate($date)
    {
        $movieList=$this->helperDB->GetMovieWithFunctionByDate($date);
        $genreList=$this->helperDB->GetGenreAll();
        require_once(VIEWS_PATH."show-billboard-by-date.php");

    }
    public function showBillBoardByGenre($id_genre)
    {
        $movieList=$this->helperDB->GetMovieWithFunctionByGenre($id_genre);
        $genreList=$this->helperDB->GetGenreAll();
        require_once(VIEWS_PATH."show-billboard-by-genre.php");

    }
}
