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
    public function getCorredores()
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
        clubs.nombreCorto AS club
        FROM
        corredores
        INNER JOIN
        categorias
        ON
        corredores.id_categoria = categorias.id
        INNER JOIN
        clubs ON
        corredores.id_club = clubs.id";


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
    public function getCategorias()
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
    public function getClubs()
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

    public function create(Corredor $corredor)
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
    public function read($id_editar)
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
    public function update($id_editar, Corredor $corredor)
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

    /**
     * Function delete
     * - Debemos tener en cuenta de que debemos borrar los registros del corredor
     * - Entrada $id_eliminar
     */
    public function delete($id_eliminar)
    {

        try {

            // comando sql borrar registros
            $sql_reg = "DELETE FROM registros WHERE id_corredor = :id";

            # prepare
            $pdostmt = $this->pdo->prepare($sql_reg);

            # vinculamos parametro
            $pdostmt->bindParam(':id', $id_eliminar, PDO::PARAM_INT);

            # Ejecutamos 
            $pdostmt->execute();

            // # Liberamos espacio
            // $pdostmt = null;

            // # Cerramos
            // $this->pdo = null;

            // comando borrar corredor
            $sql_corr = "DELETE FROM corredores WHERE id = :id";

            # Prepare
            $pdostmt = $this->pdo->prepare($sql_corr);

            # vinculamos
            $pdostmt->bindParam(':id', $id_eliminar, PDO::PARAM_INT);

            #Ejecutamos
            $pdostmt->execute();


            # Liberamos espacio
            $pdostmt = null;

            # Cerramos
            $this->pdo = null;

        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    /**
     * Function order()
     * - Muestra un SELECT como el de getCorredores
     * - Añade ordenacion mediante un criterio dado
     */
    public function order(int $criterio)
    {

        try {
            // implementamos consulta
            $sql = "SELECT
        corredores.id,
        corredores.nombre,
        corredores.apellidos,
        corredores.ciudad,
        corredores.email,
        TIMESTAMPDIFF(YEAR, corredores.fechaNacimiento, NOW()) AS edad,
        categorias.nombrecorto AS categoria,
        clubs.nombreCorto AS club
        FROM
        corredores
        INNER JOIN
        categorias
        ON
        corredores.id_categoria = categorias.id
        INNER JOIN
        clubs ON
        corredores.id_club = clubs.id
        ORDER BY
        :criterio";

            # Ejecutamos prepare
            $pdostmt = $this->pdo->prepare($sql);

            # vinculamos el criterio
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # Seleccionamos el fetchMode a objetos
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # ejecutamos
            $pdostmt->execute();

            # retornamos
            return $pdostmt;



        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }


    }

        /**
     * Function order()
     * - Muestra un SELECT como el de getCorredores
     * - Añade ordenacion mediante un criterio dado
     */
    public function buscar($expresion)
    {
        $expresion = '%'.$expresion.'%';

        try {
            // implementamos consulta
            $sql = "SELECT
            corredores.id,
            corredores.nombre,
            corredores.apellidos,
            corredores.ciudad,
            corredores.email,
            TIMESTAMPDIFF(YEAR, corredores.fechaNacimiento, NOW()) AS edad,
            categorias.nombrecorto AS categoria,
            clubs.nombreCorto AS club
            FROM
            corredores
            INNER JOIN
            categorias
            ON
            corredores.id_categoria = categorias.id
            INNER JOIN
            clubs ON
            corredores.id_club = clubs.id
            WHERE 
            concat_ws(' ',
            corredores.id,
            corredores.nombre,
            corredores.apellidos,
            corredores.ciudad,
            corredores.email,
            TIMESTAMPDIFF(YEAR, corredores.fechaNacimiento, NOW()),
            categorias.nombrecorto,
            clubs.nombreCorto)
            LIKE :expresion";

            # Ejecutamos prepare
            $pdostmt = $this->pdo->prepare($sql);

            # vinculamos el criterio
            $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_INT);

            # Seleccionamos el fetchMode a objetos
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # ejecutamos
            $pdostmt->execute();

            # retornamos
            return $pdostmt;



        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }


    }



}


?>