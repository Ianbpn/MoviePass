<?php
namespace Models;

class Schedule{
    private $id_schedule;
    private $f_time;

    public function getId_schedule(){
		return $this->id_schedule;
	}

	public function setId_schedule($id_schedule){
		$this->id_schedule = $id_schedule;
	}

	public function getF_time(){
		return $this->f_time;
	}

	public function setF_time($f_time){
		$this->f_time = $f_time;
	}
}
?>