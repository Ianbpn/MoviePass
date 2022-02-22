<?php
namespace Models;

class Yt_path{
    private $id_movie;
    private $yt_path;

    public function getId_movie(){
		return $this->id_movie;
	}

	public function setId_movie($id_movie){
		$this->id_movie = $id_movie;
	}

	public function getYt_path(){
		return $this->yt_path;
	}

	public function setYt_path($yt_path){
		$this->yt_path = $yt_path;
	}
}
?>