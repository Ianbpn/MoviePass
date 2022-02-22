<?php
    namespace DAO;

    use DAO\IClientDB as IClientDB;
    use Models\Client as Client;
    use Models\Client_Profile as ClientProfile;


    class ClientDB implements IClientDB
    {
        private $connection;
        private $tableName = "clients";

        function addClient(Client $client)
        {
            try
            {
                if(!$this->clientExist($client->getUsername())){
                $query = "INSERT INTO $this->tableName (username, passw, id_profile, id_role) VALUES (:username, :passw, :id_profile, :id_role)";

                    $parameters["username"] = $client->getUsername();
                    $parameters["passw"] = $client->getPassword();
                    $parameters["id_profile"] = $client->getProfile()->getIdProfile();
                    $parameters["id_role"] = $client->getRole()->getIdRole();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
                return true;
                }
                else{
                    return false;
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        function GetAllClient(){
            try
            {
                $clientList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $client = new Client();
                    $client->setUsername();
                    $client->setPassword();
                    array_push($clientList, $client);
                }

                return $clientList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        function GetByClientId($id){
            try
            {
                $query = "SELECT * FROM $this->tableName WHERE "."id_client =". $id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
            {                
                $client = new Client();
                $client->setIdClient($row["id_client"]);
                $client->setProfile($row["id_profile"]);
                $client->setRole($row["id_role"]);
                $client->setUserName($row["username"]);
                $client->setPassword($row["passw"]);
            }
            return $client;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function clientExist($username){
            try
            {
                $query = "SELECT * FROM $this->tableName WHERE username LIKE '%$username%'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                if($resultSet == null){                
                return false;
                 }
                else{
                return true;
                }
            
        }catch(Exception $ex)
            {
                throw $ex;
            }
        }

        function GetByClientName($name){
            try
            {
                $client= null;

                $query = "SELECT * FROM ". $this->tableName ." WHERE username = '$name'";
                //$query = "SELECT * FROM ". $this->tableName ." WHERE " .$this->tableName. ".username = '$name'";
                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
            {                
                $client = new Client();
                $client->setIdClient($row["id_client"]);
                $client->setProfile($row["id_profile"]);
                //$client->setRole($row["id_role"]);
                $client->setUserName($row["username"]);
                $client->setPassword($row["passw"]);
            }
            return $client;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Update (Client $client){
            try
            {

                $query = "UPDATE ".$this->tableName. " SET id_profile = '".$client->getProfile()->getIdProfile()."', id_role = '".$client->getRole()->getIdRole(). "', username = '".$client->getUserName()."', passw = '".$client->getPassword()."' WHERE id_client = ".$client->getIdClient();
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