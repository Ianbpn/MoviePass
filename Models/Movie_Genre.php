<?php
namespace Models;
class Movie_Genre{
    private $genre_id;
    private $genreType;
    
    public function getGenreId()
    {
        return $this->genre_id;
    }
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;

        return $this;
    }

    public function getGenreType()
    {
        return $this->genreType;
    }
    public function setGenreType ($genreType)
    {
        $this->genreType = $genreType;

        return $this;
    }
}
?>