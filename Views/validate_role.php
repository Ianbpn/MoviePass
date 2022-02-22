<?php
    $option = $_SESSION["loggedUser"]->getRole()->getIdRole();
    switch($option){
        case 1:{ require_once(VIEWS_PATH."admin-view.php"); break; }
        case 2:{ require_once(VIEWS_PATH."client-view.php"); break; }
        default: {header ("location:index"); break;}
    }
?>