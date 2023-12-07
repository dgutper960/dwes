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

}


?>