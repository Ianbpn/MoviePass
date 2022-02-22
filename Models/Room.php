<?php
namespace Models;
class Room{
    private $id;
    private $name;
    private $capacity;
    private $functionList;

    public function __construct(){
        $this->name = "";
        $this->capacity = 0;
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

    public function setCapacity($capacity){
        $this->capacity=$capacity;
    }
    public function getCapacity(){
        return $this->capacity;
    }

    public function setFunctionList($functionList){
        $this->functionList=$functionList;
    }
    public function getFunctionList(){
        return $this->functionList;
    }
}
?>