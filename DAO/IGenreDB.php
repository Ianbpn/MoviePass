<?php
    namespace DAO;

    use Models\Movie_Genre as Movie_Genre;

    interface IGenreDB
    {
        function addGenres($genres);
        function getAll();
        function getById($id);
    }
?>