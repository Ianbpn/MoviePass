<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Purchase as Purchase;

    class PurchaseDB{
        private $connection;
        private $tableName = "purchases";
        

        function addPurchase(Purchase $purchase)
        {
            try
            {
 
                $query = "INSERT INTO $this->tableName (purchase_date, ticketQuantity, total_price, discount) VALUES (:purchase_date, :ticketQuantity, :total_price, :discount)";

                    $parameters["purchase_date"] = $purchase->getPurchaseDate();
                    $parameters["ticketQuantity"] = $purchase->getTicketQuantity();
                    $parameters["total_price"] = $purchase->getTotalPrice();
                    $parameters["discount"] = $purchase->getDiscount();
                
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
                $id = null;
                $query = "SELECT MAX(id_purchase) FROM $this->tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);


                foreach ($resultSet as $row)
                {                
                    $id = $row['MAX(id_purchase)'];
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
    