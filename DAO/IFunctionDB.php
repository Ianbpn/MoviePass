<?php
    namespace DAO;

    use Models\Function as Function;

    interface IFunctionDB
    {
        function Add(Function $newFunction);
        function GetAll();
        function GetByFunctionId($id);
    }
?>