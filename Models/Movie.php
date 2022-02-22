<?php
namespace Models;
class Movie{
    private $id;
    private $backdrop_path;
    private $original_title;
    private $vote_average;
    private $release_date;
	private $overview;
	private $movie_genre;
	private $available;
	private $yt_path;
	private $genre_movie;
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getBackdrop_path(){
		return $this->backdrop_path;
	}

	public function setBackdrop_path($backdrop_path){
		$this->backdrop_path = $backdrop_path;
	}

	public function getOriginal_title(){
		return $this->original_title;
	}

	public function setOriginal_title($original_title){
		$this->original_title = $original_title;
	}

	
	public function getVote_average(){
		return $this->vote_average;
	}

	public function setVote_average($vote_average){
		$this->vote_average = $vote_average;
	}

	public function getRelease_date(){
		return $this->release_date;
	}

	public function setRelease_date($release_date){
		$this->release_date = $release_date;
	}

	public function getOverview(){
		return $this->overview;
	}

	public function setOverview($overview){
		$this->overview = $overview;
	}

	public function getMovie_genre(){
		return $this->movie_genre;
	}

	public function setMovie_genre($movie_genre){
		$this->movie_genre = $movie_genre;
	}
	public function getAvailable(){
		return $this->available;
	}

	public function setAvailable($available){
		$this->available = $available;
	}

	public function getYt_path(){
		return $this->yt_path;
	}

	public function setYt_path($yt_path){
		$this->yt_path = $yt_path;
	}
	public function getGenre_movie(){
		return $this->genre_movie;
	}

	public function setGenre_movie($genre_movie){
		$this->genre_movie = $genre_movie;
	}
}
?>