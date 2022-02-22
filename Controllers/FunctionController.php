<?php 
namespace Controllers;

use DAO\HelperDB as HelperDB;
use DAO\FunctionDB as FunctionDB;
use Models\Cinema_Function as CinemaFunction;
use Models\Movie as Movie;

class FunctionController 
{
    private $functionDB;
    private $helperDB;
    public function __construct()
    {
        $this->functionDB = new FunctionDB();
        $this->helperDB = new HelperDB();
    }
    
    public function FunctionList($id_room){
        $functionList=$this->helperDB->GetFunctionByIdRoom($id_room);
        require_once(VIEWS_PATH."function-list.php");
    }
    public function NewFunction($id_room){
        $movielist=$this->helperDB->getMovieAll();
        $functionList=$this->helperDB->GetFunctionByIdRoom($id_room);
        $scheduleList = $this->helperDB->getScheduleAll();
        require_once(VIEWS_PATH."function-add.php");
    }
    public function AddFunction($time, $day, $id_movie,$id_room){
        
        if(!$this->functionDB->ExistsFunction($day,$time,$id_room))
        {
        $function = new CinemaFunction();
        $function->setDay($day);
        $function->setTime($time);
        $function->setMovie($this->helperDB->GetMovieById($id_movie));
        
        $this->functionDB->addFunction($function, $id_room);
        $this->FunctionList($id_room);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Una Función ya existe en ese horario y fecha")';
            echo '</script>';
            $this->NewFunction($id_room);
        }
    }
    
    public function Delete ($id_room,$id_function){
        $this->functionDB->Delete($id_function);
        $this->FunctionList($id_room);

    }

    public function Update($id_function)
    {
        $function = $this->helperDB->GetFunctionByIdFunction($id_function);
        $movielist=$this->helperDB->getMovieAll();
        require_once(VIEWS_PATH."function-update.php");
        
    }

    public function Modify($id_room, $id_movie, $name, $capacity)
    {
        $room = new Room();
        $room->setId($id_room);
        $room->setName($name);
        $room->setCapacity($capacity);
        $this->roomDB->Update($room, $id_cinema);

    }
    public function AvailableTicketsAmount($id_room,$day,$time)
    {
        $availabletickets=$this->helperDB->AvailableTicketsAmount($id_room,$day,$time);
        return $availabletickets;
    }
}
?>
