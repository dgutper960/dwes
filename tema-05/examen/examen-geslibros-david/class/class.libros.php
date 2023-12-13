<?php

/*
    Clase libros 

    Aquí se definirán los métodos necesarios para completar el examen
    
*/
class Libros extends Conexion
{

    /**
     * Al heredar de conexión y no tener constructoor toma el constructor de Conexion
     */

    /**
     * Método getLibros()
     * - Retorna una consulta SQL como array de objetos Libro
     * - Solo se tomarán los campos seleccionados en la consulta
     */
    public function getLibros()
    {

        try {

            // igualamos la consulta a variable
            $sql = "SELECT 
            libros.id,
            libros.titulo,
            autores.nombre AS autor,
            editoriales.nombre AS editorial,
            libros.stock AS unidades,
            libros.precio_coste AS coste,
            libros.precio_venta AS pvp 
            FROM 
            libros
            INNER JOIN
            autores ON autor_id = autores.id
            INNER JOIN
            editoriales ON editorial_id = editoriales.id";

            # hacemos el prepare
            $pdostmt = $this->pdo->prepare($sql);

            # no necesitamos bindParam

            # Seleccionamos el fetchMode como array de objetos
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Hacemos el ejecute
            $pdostmt->execute();

            # Retornamos los datos
            return $pdostmt;


        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }
    }

    /**
     * Function getAutores()
     */
    public function getAutores()
    {
        try {

            $sql = "SELECT id, nombre FROM autores";

            $pdostmt = $this->pdo->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_ASSOC); // lo retornamos coomo array asociativo
            $pdostmt->execute();
            return $pdostmt;

        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }

    }


    public function getEditoriales()
    {
        try {

            $sql = "SELECT id, nombre FROM editoriales";

            $pdostmt = $this->pdo->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_ASSOC); // lo retornamos coomo array asociativo
            $pdostmt->execute();
            return $pdostmt;

        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }

    }

    /***
     * Funcion insertarLibro()
     * - inserta un lobro en la BBDD partiendo de un Objeto Libro
     */
    public function insertarLibro(Libro $libro)
    {
        try {

            // sentencia SQL
            $sql = "INSERT INTO libros (
            titulo,
            isbn,
            fecha_edicion,
            autor_id,
            editorial_id,
            stock,
            precio_coste,
            precio_venta
            )VALUES(
            :titulo,
            :isbn,
            :fecha_edicion,
            :autor,
            :editorial,
            :stock,
            :precio_coste,
            :precio_venta
            )";

            # Hacemos el prepare
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculamos los parametros
            $pdostmt->bindParam(":titulo", $libro->titulo, PDO::PARAM_STR);
            $pdostmt->bindParam(":isbn", $libro->isbn, PDO::PARAM_INT);
            $pdostmt->bindParam(":fecha_edicion", $libro->fecha_edicion);
            $pdostmt->bindParam(":autor", $libro->autor_id, PDO::PARAM_INT);
            $pdostmt->bindParam(":editorial", $libro->editorial_id, PDO::PARAM_INT);
            $pdostmt->bindParam(":stock", $libro->stock);
            $pdostmt->bindParam(":precio_coste", $libro->precio_coste);
            $pdostmt->bindParam(":precio_venta", $libro->precio_venta);

            # ejecutamos
            $pdostmt->execute();

            # Liberamos espacio
            $pdostmt = null;

            # Cerramos conexion
            $this->pdo = null;

        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }

    }

    /**
     * Funcion ordenar
     */
    public function order(int $num)
    {

        try {
            // consulta
            $sql = 'SELECT 
        libros.id,
        libros.titulo,
        autores.nombre AS autor,
        editoriales.nombre AS editorial,
        libros.stock AS unidades,
        libros.precio_coste AS coste,
        libros.precio_venta AS pvp 
        FROM 
        libros
        INNER JOIN
        autores ON autor_id = autores.id
        INNER JOIN
        editoriales ON editorial_id = editoriales.id
        ORDER BY
        :num';

            # prepare
            $pdostmt = $this->pdo->prepare($sql);

            # vinculamos
            $pdostmt->bindParam(':num', $num, PDO::PARAM_INT);

            # Seleccionamos el fetchMode como array de objetos
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;



        } catch (PDOException $e) {
            include('views/partials/partial.errorDB.php');
            exit();
        }


    }


}


?>