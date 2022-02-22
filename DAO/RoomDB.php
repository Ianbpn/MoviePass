<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Room as Room;

    class RoomDB{
        private $connection;
        private $tableName = "rooms";
    
        public function addRoom($room,$id_cinema){
            try
            {
                $query = "INSERT INTO  $this->tableName (id_room, room_name, room_capacity,id_cinema ) VALUES (:id_room , :room_name , :room_capacity , :id_cinema)";
                $parameters["id_room"] = $room->getId();
                $parameters["room_name"] = $room->getName();
                $parameters["room_capacity"] = $room->getCapacity();
                $parameters["id_cinema"] = $id_cinema;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getAll(){
            try
            {
                $roomList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row["id"]);
                    $room->setName($row["name"]);
                    $room->setCapacity($row["room_capacity"]);
                    array_push($roomList, $room);
                }

                return $roomList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getById($id){
            try
            {
                $query = "SELECT FROM $this->tableName WHERE"."id_room =". $id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $room = new Room();
                        $room->setId($row["id_room"]);
                        $room->setName($row["room_name"]);
                        $room->setCapacity($row["room_capacity"]);
                    }
                return $room;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function TruncateTable(){
            try{
            $query= "TRUNCATE". $this->tableName;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            }catch(Exception $ex){
                throw $ex;
            }
            return $tableName;
        }
        
        public function listById($id){
            $roomList = array();
            "SELECT FROM $this->tableName WHERE"."id_room =". $id;
            $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $room = new Room();
                        $room->setId($row["id"]);
                        $room->setName($row["name"]);
                        $room->setCapacity($row["room_capacity"]);
                        array_push($roomList, $room);
                    }
                return $roomList;
            }

            public function Delete($id){
                try
                {   
    
                    $query = "DELETE FROM $this->tableName WHERE id_room = $id";
                    $this->connection = Connection::GetInstance();
                    $resultSet=$this->connection->ExecuteNonQuery($query);
                }
                catch(Exception $ex)
                {
                    throw $ex;
                }
            }
    
            public function Update (Room $room){
                try
                {
                    $query = "UPDATE ".$this->tableName." SET room_name = '".$room->getName()."', room_capacity = '".$room->getCapacity()."' WHERE id_room = ".$room->getId();
                    //$query = "UPDATE ".$this->tableName. " SET cinema_name = '".$cinema->getName()."', capacity = '".$cinema->getCapacity(). "', address = '".$cinema->getAddress()."', entrance_value = '".$cinema->getEntrance_value()."' WHERE id_cinema = ".$cinema->getId();
                    $this->connection = Connection::GetInstance();
                    $resultSet = $this->connection->ExecuteNonQuery($query);
    
                }
                catch(Exception $ex)
                {
                    throw $ex;
                }
            }
}
?>
