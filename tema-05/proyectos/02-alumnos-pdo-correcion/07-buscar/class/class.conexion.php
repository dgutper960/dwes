<?php

    /*
        Clase Conexion
        - SERÁ USADA EN TODOS LOS PROYECTOS
            - PROPORCIONADA POR EL PROFESOR
    */

    Class Conexion {

        protected $pdo;

        public function __construct() {

            try {

                $dsn = "mysql:host=" . SERVER . ";dbname=". BD;

                $options = [

                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT =>  false,
                    PDO::ATTR_EMULATE_PREPARES =>  false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".CHARSET. " COLLATE ". COLLECTION
                    
                ];

                $this->pdo = new PDO($dsn, USER, PASS, $options);

            }
            catch (PDOException $e) {
                include('views/partials/errorDB.php');
                exit();
            }

            // echo 'Conexión realizada con éxito';

        }

        /** Creamos un método para cerrar la  conexión */
        public function cerrar_conexion(){
            $this->pdo = null;
        }

    }


?>