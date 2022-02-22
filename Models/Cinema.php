<?php
namespace Models;
class Cinema{
    private $id;
    private $name;
    private $address;
    private $entrance_value;
    private $roomList;  //room o roomList?

    public function __construct(){
        $this->name = "";
        $this->address = "";
        $this->entrance_value = 0;
        $this->roomList = null;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }

    public function setAddress($address){
        $this->address=$address;
    }
    public function getAddress(){
        return $this->address;
    }


    public function setEntrance_value($entrance_value){
        $this->entrance_value=$entrance_value;
    }
    public function getEntrance_value(){
        return $this->entrance_value;
    }

    public function setRoomList($roomList){
        $this->roomList=$roomList;
    }
    public function getRoomList(){
        return $this->roomList;
    }
}
?>