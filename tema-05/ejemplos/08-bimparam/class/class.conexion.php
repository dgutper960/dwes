<?php

/**
 * Clase Conexion
 */
    class Conexion{
        protected $pdo; // atributo visibilidad protected

        public function __construct(){
            try{
                $dsn = "musql:host=".SERVER.";dbname=".BD;

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES".CHARSET."COLLATE".COLLECTION
                        ];

                        $this->pdo = new PDO($dsn, USER, PASS, $options);
                        
            }catch(PDOException $e){
                include("views/partials/errorDB.php");
                exit();
        }
    }

}


?>