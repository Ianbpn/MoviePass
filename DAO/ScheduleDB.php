<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Schedule as Schedule;

    class RoomDB{
        private $connection;
        private $tableName = "schedules";
    
public function getAll(){
            try
            {
                $scheduleList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $schedule = new Schedule();
                    $schedule->setId_schedule($row["id_schedule"]);
                    $schedule->setF_time($row["f_time"]);
                    
                    array_push($scheduleList, $schedule);
                }

                return $scheduleList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

}
?>