<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'silvanvisscher';   

    $mysqli = new mysqli($server, $user, $password, $database);

    if ($mysqli->connect_error) {

    die ("<p style='color:black'> De poging om een verbinding te maken met de database is mislukt</p> ");

    }

?>