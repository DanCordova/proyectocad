<?php
    include "DatabaseConnector.php";
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "password";
    $dbName = "proyectocad";
    $dbConnection = new DatabaseConnector($host, $dbName, $dbUsername, $dbPassword);
?>