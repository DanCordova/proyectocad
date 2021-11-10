<?php
    include "DatabaseConnector2.php";
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "password";
    $dbName = "proyectocad2";
    $dbConnection = new DatabaseConnector($host, $dbName, $dbUsername, $dbPassword);
?>