<?php
namespace Controllers;

use DAO\GenreDB as GenreDB;

class GenreXMovieController{

    private $genreDB;

    public function __construct()
    {
        $this->genreDB = new GenreDB();
    }

    
    
}
?>