

    <!-- Codigo conexion con la base de datos mediante php -->
    <?php
        // El codigo php incluye las variables para acceder al servidor SQL remoto
        // Databaseconnector es incluido y se iniciliza la funcion DatabaseConnector dentro de Databaseconnector.php
        include "DatabaseConnector.php";    
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "password";
        $dbName = "proyectocad";
        $dbConnection = new DatabaseConnector($host, $dbName, $dbUsername, $dbPassword);
    ?>