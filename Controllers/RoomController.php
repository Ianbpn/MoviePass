<?php
namespace Controllers;
use DAO\HelperDB as HelperDB;
use DAO\RoomDB as RoomDB;
use Models\Room as Room;

class RoomController 
{
    private $roomDB;
    private $helperDB;
    public function __construct()
    {
        $this->roomDB = new RoomDB();
        $this->helperDB = new HelperDB();
    }

    public function RoomList($id_cinema){
        $roomList=$this->helperDB->GetRoomByIdCinema($id_cinema);
        require_once(VIEWS_PATH."room-list.php");
    }
    public function NewRoom($id_cinema){
        require_once(VIEWS_PATH."room-add.php");
    }
    public function AddRoom($name, $capacity, $id_cinema){
        

        $room = new Room();
        $room->setName($name);
        $room->setCapacity($capacity);
        $room->setFunctionList(null);
        $this->roomDB->addRoom($room, $id_cinema);
        $this->RoomList($id_cinema);
    }

    public function Delete ($id_cinema,$id_room){
        $this->roomDB->Delete($id_room);
        $this->RoomList($id_cinema);
    }

    public function Update($id_cinema,$id_room)
    {

        $room = $this->helperDB->GetRoomByIdRoom($id_room);

        require_once(VIEWS_PATH."room-update.php");
        
    }

    public function Modify($id_cinema,$id_room,$name, $capacity)
    {
        $room = new Room();
        $room->setId($id_room);
        $room->setName($name);
        $room->setCapacity($capacity);
        $this->roomDB->Update($room);

        $this->RoomList($id_cinema);
    }

    /*public function Update(){
        $newRoom = $this->roomDB->updateRooms();
        if($roomList != null){
            foreach($roomList as $row){
                $room->setId($row['id_room']);
                $room->setName($row['room_name']);
                $room->setCapacity($row['capacity']);
                $this->roomDB->addRoom($room);
            }
            var_dump($room);
        }
    }*/

    public function showRoomViews()
    {
        $roomList=$this->roomDB->getAll();
        require_once(VIEWS_PATH."room-list.php");

    }
}
?>
