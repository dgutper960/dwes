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

    /**
     * Método getCategorias()
     * -  Carga las categorías en un array indexado
     */
    function getCategorias(){
        # consulta sql
        $sql = "SELECT 
        id, nombrecorto
    FROM
        categorias
    ORDER BY id ASC";

        # No necesitamos bindParam

        # Ejecutamos el prepare
        $pdostmt = $this->pdo->prepare($sql);

        # Seleccionamos del tipo de fetch como assoc
        $pdostmt->setFetchMode(PDO::FETCH_ASSOC);

        # Ejecutamos
        $pdostmt->execute();

        # Retornamos
        return $pdostmt;

    }

        /**
     * Método getClubs()
     * -  Carga las categorías en un array indexado
     */
    function getClubs(){
        # consulta sql
        $sql = "SELECT 
        id, nombrecorto
    FROM
        clubs
    ORDER BY id ASC";

        # No necesitamos bindParam

        # Ejecutamos el prepare
        $pdostmt = $this->pdo->prepare($sql);

        # Seleccionamos del tipo de fetch como assoc
        $pdostmt->setFetchMode(PDO::FETCH_ASSOC);

        # Ejecutamos
        $pdostmt->execute();

        # Retornamos
        return $pdostmt;

    }








}


?>