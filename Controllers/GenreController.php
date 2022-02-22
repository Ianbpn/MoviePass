<?php
namespace Controllers;

use Models\Movie_Genre as Movie_Genre;
use DAO\GenreDB as GenreDB;
use DAO\ApiDB as ApiDB;


class GenreController{

    private $apiDB;
    private $genreDB;
    public function __construct()
    {
        $this->apiDB = new ApiDB();
        $this->genreDB = new GenreDB();
    }


    public function Update(){
        $genreList = $this->apiDB->updateGenres();
        if($genreList != null){
            $this->genreDB->TruncateTable();

            foreach($genreList["genres"] as $row){
                $genre = new Movie_Genre;

                $genre->setGenreId($row->getGenreId());
                $genre->setGenreType($row->getGenreType());

                $this->genreDB->addGenres($genre);
            }
        }
    }
}


?>