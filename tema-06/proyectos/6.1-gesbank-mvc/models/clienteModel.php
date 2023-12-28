<?php

/**
 * 
 * clienteModel.php
 *     Definimos los métodos de acceso a la BBDD
 * -> Esta clase hereda de Model
 *      - Al no tener constructor propio hereda el del padre
 */

class clienteModel extends Model
{
    // Métodfo get() -> Obtiene los resultados de la tabla clientes
    public function get()
    {
        try {
            # Comando sql
            $sql = "SELECT 
            id, apellidos, nombre, telefono, ciudad, dni, email
        FROM
            clientes
        ORDER BY id";

        # Conectamos -> ejecuta el método connect() de db
        $conexion = $this->db->connect();

        # Ejecutamos el prepare
        $pdostmt = $conexion->prepare($sql); // resultado de la consulta = objeto pdostmt
        
        # bindParam no neceseario (solo se obtienen datos)

        # Establecemos el tipo de fetch como objeto
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        # Ejecutamos
        $pdostmt->execute();

        # Retornamos
        return $pdostmt;
        
        }catch(PDOException $e){
            include_once('template/partials/errorDB.php');
            exit();
            // Incluimos en el catch er fichero correspondiente
        }
    }
}

?>