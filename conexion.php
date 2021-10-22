<?php
class Conexion
    public static function Conectar()   {
        define('servidor','localhost');
        define('Test','TEST1 ');
        define('usuario','root');
        define('password','password');

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND -> "SET NAMES utf-8");

        try{
            $conexion = new PDO("mysql:host=".servidor"; dbname=".Test,usuario,password,$opciones);
            return $conexion
        } catch(Exception $e){
            die("Error de conxión es".$e -> getMessage());

        }
        
    }



}



>
