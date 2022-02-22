<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "Hola, este es el homeController")
        {
            require_once(VIEWS_PATH."login.php");
        }        
    }
?>