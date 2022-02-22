<?php namespace Models;


class Client{

	private $id_client;
	public $profile;
	public $role;
    private $username;
    private $password;

	public function getIdClient(){
		return $this->id_client;
	}

	public function setIdClient($id_client){
		$this->id_client= $id_client;   
	}
	public function getProfile(){
		return $this->profile;
	}

	public function setProfile($profile){
		$this->profile = $profile;   
	}
	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role = $role;   
    }


    public function getUserName(){
		return $this->username;
	}

	public function setUserName($username){
		$this->username = $username;   
    }
    
    public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;   
    }
}

?>