<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Cinema_Function as CinemaFunction;
    use Models\Movie as Movie;

    class FunctionDB
    {
        private $connection;
        private $tableName = "functions";

        public function addFunction($function,$id_room){
            try
            {
                $query = "INSERT INTO  $this->tableName (f_day, f_time, id_movie ,id_room ) VALUES (:f_day , :f_time , :id_movie , :id_room)";
                $parameters["f_day"] = $function->getDay();
                $parameters["f_time"] = $function->getTime();
                $parameters["id_movie"] = $function->getMovie()->getId();
                $parameters["id_room"] = $id_room;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Delete($id){
            try
            {   
                $query = "DELETE FROM $this->tableName WHERE id_function = $id";
                $this->connection = Connection::GetInstance();
                $resultSet=$this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function Update (CinemaFunction $function){
            try
            {
                $query = "UPDATE ".$this->tableName." SET f_time = '".$function->getTime()."', f_day = '".$function->getDay()."', id_movie = '".$function->getMovie()->getId()."' WHERE id_function = ".$function->getId();
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->ExecuteNonQuery($query);

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ExistsFunction($day,$time,$idRoom)
        {
            try
            {
                $query = "SELECT * FROM ". $this->tableName.
                " WHERE f_day LIKE '%" .$day. "%' AND f_time LIKE '%" .$time. "%' AND id_room = " .$idRoom;
                
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                if(empty($resultSet)){
                    return false;
                }
                return true;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
}

?>