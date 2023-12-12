<?php

/**
 * Esta clase debe heredar de conexión
 * - Contendrá todos los métodos para consultas SQL
 */

class Corredores extends Conexion
{

    /**
     * Al no tener constructor hereda el constructor de Conexion
     */

    /**
     * Implementamos el método para cargar los corredores
     * - Estrae un array de objetos Corredor de la basse de datos
     */
    function getCorredores()
    {

        // creamos la consulta SQL y la igualamos a una variable
        $sql = "SELECT
        corredores.id,
        corredores.nombre,
        corredores.apellidos,
        corredores.ciudad,
        corredores.email,
        TIMESTAMPDIFF(YEAR, corredores.fechaNacimiento, NOW()) AS edad,
        categorias.nombrecorto AS categoria,
        categorias.nombrecorto AS club
        FROM
        corredores
        INNER JOIN
        categorias
        ON
        corredores.id_categoria = categorias.id";


        /**
         * Generamos el prepare
         */
        $pdostmt = $this->pdo->prepare($sql);

        # En este caso no tenemos que vincular parametros

        # Debemos seleccionar el fetchmode
        $pdostmt->setFetchMode(PDO::FETCH_OBJ); 
        // los atributos de este objeto van a coincidir con los nombres de las columnas en la consulta 

        # Hacemos el execute
        $pdostmt->execute();

        # Retornamos
        return $pdostmt;


    }






}


?>