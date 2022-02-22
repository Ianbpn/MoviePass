<?php
namespace Models;
class Ticket{
    private $cinema;
    private $room;
    private $day;
    private $time;
	private $id_ticket;
	private $movie;

    public function getCinema(){
		return $this->cinema;
	}

	public function setCinema($cinema){
		$this->cinema = $cinema;
	}

	public function getRoom(){
		return $this->room;
	}

	public function setRoom($room){
		$this->room = $room;
	}

	public function getDay(){
		return $this->day;
	}

	public function setDay($day){
		$this->day = $day;
	}

	public function getTime(){
		return $this->time;
	}

	public function setTime($time){
		$this->time = $time;
	}

    public function getIdTicket()
    {
        return $this->id_ticket;
    }
    public function setIdTicket($id_ticket)
    {
        $this->id_ticket = $id_ticket;

        return $this;
	}
	
	public function getMovie(){
		return $this->movie;
	}

	public function setMovie($movie){
		$this->movie = $movie;
	}
}
?>