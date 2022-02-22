<?php
    namespace Controllers;

    use DAO\HelperDB as HelperDB;
    use DAO\ClientDB as ClientDB;
    use DAO\ClientProfileDB as ClientProfileDB;
    use Models\Client as Client;
    use Models\Client_Profile as ClientProfile;
    use Models\Client_Role as ClientRole;

    class ClientController
    {
        private $helperDB;
        private $clientDB;
        private $clientProfileDB;

        public function __construct()
        {
            $this->helperDB = new HelperDB();
            $this->clientDB = new ClientDB();
            $this->clientProfileDB = new ClientProfileDB();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }
        
        public function AddClient($username, $password)
        {
            
            $client = new Client();
            $client->setUserName($username);
            $client->setPassword($password);
            $client->setProfile(new ClientProfile());
            $client->setRole(new ClientRole());
            $client->role->setIdRole(2);
            if($this->clientDB->addClient($client)){
                $this->Login($client->getUserName(),$client->getPassword());
            }
            else{
                $this->Register();
            }
        }
        public function Register()
        {
            require_once(VIEWS_PATH."client-add.php");
        }

        /*public function GetClient($id)
        {
            $client = $this->clientDB->GetByClientId($id);
            return $client;
        }*/

        public function GetClient($id)
        {
            $client = $this->helperDB->GetClient($id);
            return $client;
        }

        public function GetProfile($id)
        {

            $clientProfile = $this->helperDB->GetProfileByIdProfile($id);
            return $clientProfile;
        }

        //Session
        public function Login($username, $password)
        {
            
            $client = $this->helperDB->GetClientByUsername($username); 

            if(($client != null) && ($client->getPassword() == $password))
            {
                $_SESSION["loggedUser"] = $client;
                if ($this->IsProfileNull($client)){
                    require_once(VIEWS_PATH."profile-create.php");
                }
                else{
                    require_once(VIEWS_PATH.'validate_role.php');
                }
                
            }
            else{
            echo '<script language="javascript">';
            echo 'alert("Usuario y/o Contraseña incorrectos")';
            echo '</script>';
             $this->Index();}
        }

        public function Logout()
        {
            session_destroy();

            $this->Index();
        }
        //Profiles
        public function IsProfileNull(Client $client)   //retorna True si no tiene id de perfil o Falso si tiene id de perfil
        {
            if (!$client->getProfile()){
                return true;
            }
            else
            {
                return false;
            }
        }

        public function Update()
        {
            $actual=$_SESSION["loggedUser"]->getProfile();
            require_once(VIEWS_PATH."profile-update.php"); 
        }

        public function Modify($id,$name, $surname, $dni)
        {
            $client = new ClientProfile();
            $client->setIdProfile($id);
            $client->setFirstname($name);
            $client->setSurname($surname);
            $client->setDni($dni);
            
            $this->clientProfileDB->Update($client);
            $_SESSION["loggedUser"]->setProfile($client);
            $this->ShowProfile();
        }

        public function CreateProfile($surname,$firstname,$dni,$id_client)
        {
            $client_profile = new ClientProfile();
            $client_profile->setSurname($surname);
            $client_profile->setFirstname($firstname);
            $client_profile->setDni($dni);
            $this->clientProfileDB->addClientProfile($client_profile,$id_client);
            //Actualizacion Id Profile a Cliente
            $client_profile = $this->helperDB->GetProfileByIdClient($id_client);
            $client = $this->helperDB->GetClientById($id_client);
            $client->setProfile($this->helperDB->GetProfileByIdProfile($client_profile->getIdProfile()));
            $this->clientDB->Update($client);
            header("Location: index");
        }

        public function ShowProfile(){
            $actual=$_SESSION["loggedUser"]->getProfile();
            require_once(VIEWS_PATH."show-profile.php");
        }
    }
?>