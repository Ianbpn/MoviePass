<?php
namespace DAO;

use DAO\Connection as Connection;
use Models\Movie as Movie;
use Models\Genre_movie as Genre_movie;
use Models\GenreXmovie as GenreXmovie;

class GenreXmovieDB{
    private $connection;
    private $tableName = 'genre_x_movie';
    private $gxm;

    public function __construct(){
        $gxm = new GenreXmovie; 
    }

    public function addGenreXmovie($genreXmovie){
        try
        {
            $query = "INSERT INTO ".$this->tableName." (id_genre, id_movie) VALUES (:id_genre, :id_movie)";
            $parameters["id_genre"] = $genreXmovie->getId_genre();
            $parameters["id_movie"] = $genreXmovie->getId_movie();
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }catch(Exception $ex){
            throw $ex;
        }
    }


}
?>