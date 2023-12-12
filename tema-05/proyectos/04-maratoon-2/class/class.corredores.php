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
    function getCategorias()
    {
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
    function getClubs()
    {
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

    /**
     * Function create()
     * - Agrega un Corredor a la BBDD
     * - Sentencia Insert
     * - Parametro de entrada obligatorio de la clase Corredor
     */

    function create(Corredor $corredor)
    {

        try {
            // sentencia sql Insert
            $sql = "INSERT INTO corredores (
            nombre,
            apellidos,
            ciudad,
            fechaNacimiento,
            sexo,
            email,
            dni,
            edad,
            id_categoria,
            id_club
            )VALUES(
            :nombre,
            :apellidos,
            :ciudad,
            :fechaNacimiento,
            :sexo,
            :email,
            :dni,
            timestampdiff(year, fechaNacimiento, now()),
            :id_categoria,
            :id_club
            )";

            # Ejecutamos el prepare
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculamos los parámetros
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 100);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT);

            # Ejecutamos
            $pdostmt->execute();

            # Una vez insertado el registro podemos liberar espacio
            $pdostmt = null;

            # Cerramos la conexión
            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    /**
     * Function read()
     * - Retorna un objeto de la Clase Corredor
     * - Sentencia SELECT por id del corredor
     */
    function read($id_editar)
    {

        try {
            # Definimos la sentencia
            $sql = "SELECT * FROM corredores WHERE id = :id LIMIT 1";

            # Ejecutamos el prepare
            $stmt = $this->pdo->prepare($sql);

            # Vinculamos el parametro
            $stmt->bindParam(':id', $id_editar, PDO::PARAM_INT);

            # Obtenemos el objeto de la clase pdostmt
            $stmt->execute();

            # Seleccionamos el tipo de fetch
            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Corredor no encontrado');
            }

            # retornamos el objeto
            return $data;

        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }

    }

    /***
     * Function update()
     * - Entrada
     *      - $id_editar
     *      - Objeto Corredor
     * 
     */
    function update($id_editar, Corredor $corredor)
    {

        // sentencia SQL
        $sql = "UPDATE corredores SET
        nombre = :nombre,
        apellidos = :apellidos,
        ciudad = :ciudad,
        fechaNacimiento =:fechaNacimiento,
        sexo = :sexo,
        email = :email,
        dni = :dni,
        id_categoria = :id_categoria,
        id_club = :id_club
        WHERE
        id = :id";

        # Ejecutamos el prepare
        $pdostmt = $this->pdo->prepare($sql);

        # BindParam
        $pdostmt->bindParam(':nombre', $corredor->nombre);
        $pdostmt->bindParam(':apellidos', $corredor->apellidos);
        $pdostmt->bindParam(':ciudad', $corredor->ciudad);
        $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
        $pdostmt->bindParam(':sexo', $corredor->sexo);
        $pdostmt->bindParam(':email', $corredor->email);
        $pdostmt->bindParam(':dni', $corredor->dni);
        $pdostmt->bindParam(':id_categoria', $corredor->id_categoria);
        $pdostmt->bindParam(':id_club', $corredor->id_club);
        $pdostmt->bindParam(':id', $id_editar);

        # Ejecutamos
        $pdostmt->execute();

        #liberamos espacio
        $pdostmt = null;
        # cerramos 
        $this->pdo = null;




    }







}


?>