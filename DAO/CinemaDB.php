<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Cinema as Cinema;

    class cinemaDB implements ICinemaDB{
        private $connection;
        private $tableName = "cinemas";
    
        public function addCinema(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO $this->tableName (cinema_name, address, entrance_value) VALUES (:cinema_name, :address, :entrance_value)";
                $parameters["cinema_name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();
                $parameters["entrance_value"] = $cinema->getEntrance_value();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getAll()
        {
            try
            {
                $cinemaList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setEntrance_value($row["entrance_value"]);

                    array_push($cinemaList, $cinema);
                }

                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Delete($id){
            try
            {   

                $query = "DELETE FROM $this->tableName WHERE id_cinema = $id";
                $this->connection = Connection::GetInstance();
                $resultSet=$this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Update (Cinema $cinema){
            try
            {
                $query = "UPDATE ".$this->tableName. " SET cinema_name = '".$cinema->getName()."', address = '".$cinema->getAddress()."', entrance_value = '".$cinema->getEntrance_value()."' WHERE id_cinema = ".$cinema->getId();
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->ExecuteNonQuery($query);

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetById($id){
            try{
                
                $query = "SELECT * FROM $this->tableName WHERE id_cinema = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setEntrance_value($row["entrance_value"]);
                }
                return $cinema;

            }catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
