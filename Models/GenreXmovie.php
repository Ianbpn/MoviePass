<?php
namespace Models;

class GenreXmovie{
    private $id_movie;
    private $id_genre = array();

    public function getId_movie(){
		return $this->id_movie;
	}

	public function setId_movie($id_movie){
		$this->id_movie = $id_movie;
	}

	public function getId_genre(){
		return $this->id_genre;
	}

	public function setId_genre($id_genre){
		$this->id_genre = $id_genre;
	}
}
?>