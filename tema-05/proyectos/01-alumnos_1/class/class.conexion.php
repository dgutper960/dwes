<?php

/**
 * Clase conexion mysql
 * -> Clase valida para todos los proyectos
 * 
 */
class Conexion
{
    // objjeto de la clase mysqli
    public $db;

    public function __construct()
    {

        try {
            $this->db = new mysqli('localhost', 'root', ' ', 'fp');
            if ($this->db->connect_error) {
                throw new Exception('ERROR');
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            echo '<br>';
            echo 'CODIGO: ' . $e->getCode();
            echo '<br>';
            echo 'FICHERO: ' . $e->getFile();
            echo '<br>';
            echo 'LÍNEA: ' . $e->getLine();
            echo '<br>';
            exit();


        }

    }

}


?>