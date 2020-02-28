<?php

    session_start();
    
    //create_cat.php
    include 'connect.php';
    include_once 'Functions.php';
    
    //prendo l'Id dell'argomento dal link URL e controllo che effettivamente sia presente
    $Id =  mysqli_real_escape_string($mysqli, $_GET['Id']);
    if(!$Id){
        echo 'Errore Argomento.';
    } else {
        CreaPost();
    }
?>

