<?php

/*
    albumModel.php

    Modelo del  controlador albums

    Definir los métodos de acceso a la base de datos
    
    - insert
    - update
    - select
    - delete
    - etc..
*/

class AlbumModel extends Model
{

    /*
        Extrae los detalles  de los albums
    */
    public function get()
    {

        try {

            # comando sql
            $sql = "
                SELECT
                    id,
                    titulo,
                    lugar,
                    categoria,
                    etiquetas,
                    num_fotos,
                    num_visitas
                        FROM 
                    albumes
                        ORDER BY id ASC
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function getCursos()
    {

        try {
            # Plantilla
            $sql = "
                
                    SELECT 
                            id,
                            tituloCorto curso
                    FROM 
                            cursos
                    ORDER BY 
                            tituloCorto

                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            # ejecutar PREPARE
            $result = $conexion->prepare($sql);

            # establezco com quiero que devuelva el resultado
            $result->setFetchMode(PDO::FETCH_OBJ);

            # ejecuto
            $result->execute();

            return $result;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }


    }

    public function create(classAlbum $album)
    {

        try {
            $sql = "
                    INSERT INTO album (
                        titulo,
                        lugar,
                        categoria,
                        etiquetas,
                        num_fotos,
                        num_visitas
                    )
                    VALUES (
                        :titulo,
                        :lugar,
                        :categoria,
                        :etiquetas,
                        :num_fotos,
                        :num_visitas
                    )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 20);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':num_fotos', $album->num_fotos, PDO::PARAM_INT);
            $pdoSt->bindParam(':num_visitas', $album->num_visitas, PDO::PARAM_INT);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read($id)
    {

        try {
            $sql = "
                SELECT
                    id,
                    titulo,
                    lugar,
                    categoria,
                    etiquetas,
                    num_fotos,
                    num_visitas
                        FROM 
                    albumes
                        ORDER BY id ASC
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(classAlbum $album, $id)
    {

        try {

            $sql = "
                
                UPDATE albums
                SET
                        titulo = :titulo,
                        lugar = :lugar,
                        categoria = :categoria,
                        etiquetas = :etiquetas,
                        num_fotos = :num_fotos,
                        num_visitas = :num_visitas
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 20);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':num_fotos', $album->num_fotos, PDO::PARAM_INT);
            $pdoSt->bindParam(':num_visitas', $album->num_visitas, PDO::PARAM_INT);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    /*
       Extrae los detalles  de los albums
   */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
            SELECT
                    id,
                    titulo,
                    lugar,
                    categoria,
                    etiquetas,
                    num_fotos,
                    num_visitas
                FROM 
            albumes
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT
                        id,
                        titulo,
                        lugar,
                        categoria,
                        etiquetas,
                        num_fotos,
                        num_visitas
                    FROM 
                        albumes
                WHERE

                    CONCAT_WS(  ', ', 
                                    album.id,
                                    album.titulo,
                                    album.lugar,
                                    album.categoria,
                                    album.etiquetas,
                                    album.num_fotos,
                                    album.num_visitas
                                ) 
                    like :expresion

                ORDER BY 
                    album.id
                
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    # Validación categoria único
    public function validateUniquecategoria($categoria)
    {
        try {

            $sql = " 

                SELECT * FROM albums 
                WHERE categoria = :categoria
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    # Validación num_visitas único
    public function validateUniquenum_visitas($num_visitas)
    {
        try {

            $sql = " 

                SELECT * FROM albums 
                WHERE num_visitas = :num_visitas
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':num_visitas', $num_visitas, PDO::PARAM_STR);
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    # Validación curso
    public function validateCurso($id_curso)
    {
        try {

            $sql = " 

                SELECT * FROM cursos 
                WHERE id = :id_curso
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
            $pdost->execute();

            if ($pdost->rowCount() == 1) {
                return TRUE;
            }

            return FALSE;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function delete($id)
    {
        try {

            $sql = "DELETE FROM albums WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }




}

?>