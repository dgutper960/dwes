<?php
/**
 * Clase Corredores
 *  - Esta clase extiende de la clase conexión
 *  - No dispone de constructor propio (hereda el de conexión)
 *  - Contendrá los métodos para el CRUD
 */

class Corredores extends Conexion
{

    /**
     * getCorrediores()
     * - Retorna una selección de datos del corredor 
     * - Los mostraremos en el view.index.php
     */
    public function getCorredores()
    {

        // definimos variable sql y la igualamos a la consulta SQL deseada
        $sql = "SELECT 
    corredores.id,
    corredores.nombre,
    corredores.apellidos,
    corredores.ciudad,
    corredores.email,
    corredores.edad,
    categorias.nombrecorto AS categoria, /** Pensamos en cada uno de los resultados como propiedades del objeto */
    clubs.nombreCorto AS club
FROM
    corredores
        INNER JOIN
    categorias ON corredores.id_categoria = categorias.id
        INNER JOIN
    clubs ON corredores.id_club = clubs.id";

        # ejecutamos el prepare -> objeto de la clase pdostsmt
        $podstsmt = $this->pdo->prepare($sql); // pasamos como argumento el resultado la consulta

        # Al no tener que pasar parámetros a la BBDD no requerimos bigparam

        # Establecemos el tipo de fetch
        $podstsmt->setFetchMode(PDO::FETCH_OBJ); // extrae cada emento como un objeto

        # ejecutamos -> se obtiene un objeto de la clasae pdoresult
        $podstsmt->execute();

        # Retornamos el objeto
        return $podstsmt;

    }

    /**
     * Funcion getCategorias()
     *  - Carga un array asociativo de categorías con las categorías de la BBDD
     *  - De cada categoría obtenemos:
     *      id
     *      nombreCorto
     */
    public function getCategorias()
    {
        $sql = "SELECT 
        id, nombrecorto
    FROM
        categorias
    ORDER BY id";

        # ejecutamos el prepare
        $pdostsmt = $this->pdo->prepare($sql);

        # Establecemos el FECH como array asociativo
        $pdostsmt->setFetchMode(PDO::FETCH_ASSOC);

        # Ejecutamos
        $pdostsmt->execute();

        # Retornamos
        return $pdostsmt;


    }

    /**
     * Function getClubs()
     *  - Carga un array asociativo de club con las club de la BBDD
     *  - De cada club obtenemos:
     *      id
     *      nombreCorto
     */
    public function getClubs()
    {
        $sql = "SELECT 
        id, nombrecorto
    FROM
        clubs
    ORDER BY id";

        # ejecutamos el prepare
        $pdostsmt = $this->pdo->prepare($sql);

        # Establecemos el FECH como array asociativo
        $pdostsmt->setFetchMode(PDO::FETCH_ASSOC);

        # Ejecutamos
        $pdostsmt->execute();

        # Retornamos
        return $pdostsmt;
    }

    /**
     * Function insert_corredor
     * - Inserta un corredor nuevo en la BBDD
     * - Toma como entrada un objeto del tipo Corredor
     */

    public function insert_corredor(Corredor $corredor)
    {
        // abrimos bloque try-catch
        try{
            // preparamos nuestro comando SQL
            $sql = "INSERT INTO corredores VALUES(
                null,
                :nombre,
                :apellidos,
                :ciudad,
                :fechaNacimiento,
                :sexo,
                :email,
                :dni,
                null,
                :id_categoria,
                :id_club
            )";

            # Ejecutamos el prepare de la clase PDOstsmt
            $pdostsmt = $this->pdo->prepare($sql);

            # Vinculamos los parámetros con bindParam
            $pdostsmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 20);
            $pdostsmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 45);
            $pdostsmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostsmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostsmt->bindParam(':sexo', $corredor->sexo);
            $pdostsmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 45);
            $pdostsmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostsmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT, 10);
            $pdostsmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT, 10);

            # Ejecutamos el sql
            $pdostsmt->execute();

            # Liberamos espacio
            $pdostsmt = null;

            # Cerramos la conexion
            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();
        }
    }

}


?>