<?php
namespace Models;
class Client_Profile{
    private $surname;
    private $firstname;
    private $dni;
    private $id_profile;

    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getIdProfile()
    {
        return $this->id_profile;
    }
    public function setIdProfile($id_profile)
    {
        $this->id_profile = $id_profile;

        return $this;
    }


    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
}
?>
