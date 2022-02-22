<?php
    namespace DAO;

    use Models\Movie as Movie;

    interface IMovieDB
    {
        function addMovie($movie);
        function getAll();
        function getById($id);
    }
?>