<?php
namespace DAO;

use DAO\Connection as Connection;
use Models\Movie as Movie;
use Models\Movie_genre as Movie_genre;

class Movie_genreDB{
    private $connection;
    private $tableName = 'movie_genre';
    private $movie_genre;



    public function addGenre($genre){
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_genre, genreType) VALUES (:id_genre, :genreType)";
        
                $parameters["id_genre"] = $genre->getGenreId();
                $parameters["genreType"] = $genre->getGenreType();
                

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
    
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    public function GenreExist($id){ //retorna False si no encunetra coincidencia o True si la hay
        try{
        $flag=false;
        $query = "SELECT * FROM $this->tableName WHERE id_genre = $id";
        $this->connection = Connection::GetInstance();
        $resultSet = $this->connection->Execute($query);
            if($resultSet)
            {
                $flag=true;
            }
        return $flag;
        }
        catch(Exception $ex){
            throw $ex;
        }
    }

}
?>