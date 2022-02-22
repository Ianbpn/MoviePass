<?php
    namespace DAO;

    use DAO\IClientDB as IClientDB;
    use Models\Client_Profile as ClientProfile;

    class ClientProfileDB
    {
        private $connection;
        private $tableName = "profiles";

        function addClient(Client $client)
        {
            try
            {
                if(!$this->clientExist($client->getUsername())){
                $query = "INSERT INTO $this->tableName (username, passw, id_profile, id_role) VALUES (:username, :passw, :id_profile, :id_role)";

                    $parameters["username"] = $client->getUsername();
                    $parameters["passw"] = $client->getPassword();
                    $parameters["id_profile"] = $client->getIdProfile();
                    $parameters["id_role"] = $client->getIdRole();
                
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
        function GetProfileByProfileId($id){
            try
            {
                $query = "SELECT * FROM $this->tableName WHERE id_profile = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
            {                
                $client_profile = new ClientProfile();
                $client_profile->setIdClient($row["id_client"]);
                $client_profile->setIdProfile($row["id_profile"]);
                $client_profile->setDni($row["dni"]);
                $client_profile->setFirstame($row["firstname"]);
                $client_profile->setSurname($row["surname"]);
            }
            return $client_profile;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        function GetProfileByClientId($id){
            try
            {
                $query = "SELECT * FROM $this->tableName WHERE id_client = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
            {                
                $client_profile = new ClientProfile();
                $client_profile->setIdProfile($row["id_profile"]);
                $client_profile->setDni($row["dni"]);
                $client_profile->setFirstname($row["firstname"]);
                $client_profile->setSurname($row["surname"]);
            }
            return $client_profile;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }
        function addClientProfile (ClientProfile $client_profile, $id_client)
        {
            try
            {
                
                $query = "INSERT INTO $this->tableName (firstname, surname, dni, id_client) VALUES (:firstname, :surname, :dni, :id_client)";

                    $parameters["firstname"] = $client_profile->getFirstname();
                    $parameters["surname"] = $client_profile->getSurname();
                    $parameters["dni"] = $client_profile->getDni();
                    $parameters["id_client"] = $id_client;
                
                    var_dump($parameters);
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Update (ClientProfile $client){
            try
            {

                $query = "UPDATE ".$this->tableName. " SET firstname = '".$client->getFirstname()."', surname = '".$client->getSurname(). "', dni = '".$client->getDni()."' WHERE id_profile = ".$client->getIdProfile();
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