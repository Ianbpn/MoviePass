<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Ticket as Ticket;

    class TicketDB{
        private $connection;
        private $tableName = "tickets";
        

        function addTicket(Ticket $ticket)
        {
            try
            {
                $query = "INSERT INTO $this->tableName (id_movie, id_cinema, id_room, day, time) VALUES (:id_movie, :id_cinema, :id_room, :day, :time)";
                    $parameters["id_movie"] = $ticket->getMovie()->getId();
                    $parameters["id_cinema"] = $ticket->getCinema()->getId();
                    $parameters["id_room"] = $ticket->getRoom()->getId();
                    $parameters["day"] = $ticket->getDay();
                    $parameters["time"] = $ticket->getTime();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
                
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        function GetLastId()
        {
            try
            {
                $id=null;
                $query = "SELECT MAX(id_ticket) FROM $this->tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);


                foreach ($resultSet as $row)
                {                
                    $id=$row['MAX(id_ticket)'];
            

                }
                return $id;
                
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
    ?>
    