<?php
    namespace DAO;

    use Models\Client as Client;

    interface IClientDB
    {
        function addClient(Client $newclient);
        function GetAllClient();
        function GetByClientId($id);
        function GetByClientName($name);
    }
?>