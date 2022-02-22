<?php
    namespace DAO;

    use Models\Cinema as Cinema;

    interface ICinemaDB
    {
        function AddCinema(Cinema $cinema);
        function Delete(Cinema $cinema);
        function GetAll();
        function Update (Cinema $cinema);
    }
?>