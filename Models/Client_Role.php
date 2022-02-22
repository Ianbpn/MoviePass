<?php
namespace Models;
class Client_Role{
    private $description;
    private $id_role;

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getIdRole()
    {
        return $this->id_role;
    }
    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }
}
?>