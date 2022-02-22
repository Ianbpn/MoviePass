<?php
namespace DAO;

use DAO\Connection as Connection;

class PxtDB{
    private $connection;
    private $tableName = 'purchases_x_tickets';

    public function addPXT($purchaseId, $ticketId){
        try
        {   
            $query = "INSERT INTO ".$this->tableName." (id_purchase, id_ticket) VALUES (:id_purchase, :id_ticket)";
            $parameters["id_purchase"] = $purchaseId;
            $parameters["id_ticket"] = $ticketId;
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }catch(Exception $ex){
            throw $ex;
        }
    }


}
?>