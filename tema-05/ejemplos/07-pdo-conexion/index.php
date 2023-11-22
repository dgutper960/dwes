<?php
/**
 * Conexion mediantye PDO
 */

 //variables
 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $database = 'fp';

 # Conexion

try{
    $dsn = "musql:host=$server;dbname=$dbname";

    // especificamos las opciones de conexión mediante un array
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    // guardamos la conexion en una variable
    $pdo = new PDO($dsn, $user, $pass, $options);

}
catch(PDOException $e){
    echo "Mensaje". $e->getMessage();
    echo"codigo del error". $e->getCode();

}


?>