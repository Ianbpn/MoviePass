<?php
    $option = $_SESSION["loggedUser"]->getRole()->getIdRole();
    switch($option){
        case 1:{ break; }
        case 2:{ header("location:../index"); break; }
        default: {header ("location:../index"); break;}
    }
?>