<?php
namespace DAO;

use DAO\Connection as Connection;

class PxcDB{
    private $connection;
    private $tableName = 'purchases_x_clients';

    public function addPXC($purchaseId, $clientId){
        try
        {
            $query = "INSERT INTO ".$this->tableName." (id_purchase, id_client) VALUES (:id_purchase, :id_client)";
            $parameters["id_purchase"] = $purchaseId;
            $parameters["id_client"] = $clientId;
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }catch(Exception $ex){
            throw $ex;
        }
    }


}
?>