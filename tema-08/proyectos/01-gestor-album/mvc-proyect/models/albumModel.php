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

class albumModel extends Model
{

    /*
        Extrae los detalles  de los albums
    */
    public function get()
    {

        try {

            # comando sql
            // seleccionamos los campos que vamos a mostrar en la vista
            $sql = "
                SELECT 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    lugar,
                    categoria,
                    etiquetas,
                    carpeta
                FROM
                    album.albumes
                ORDER BY id
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


    public function create(classAlbum $album)
    {

        try {
            $sql = "
                    INSERT INTO albums (
                        titulo,
                        descripcion,
                        autor,
                        fecha,
                        lugar,
                        categoria,
                        etiquetas,
                        carpeta
                    )
                    VALUES (
                        :titulo,
                        :descripcion,
                        :autor,
                        :fecha,
                        :lugar,
                        :categoria,
                        :etiquetas,
                        :carpeta
                    )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100); // valor maximo en la validación
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

            // Creamos la carpeta dentro del directorio images
            mkdir('images/' . $album->carpeta);

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
                        descripcion,
                        autor,
                        fecha,
                        lugar,
                        categoria,
                        etiquetas,
                        carpeta
                    FROM 
                        albums
                    WHERE
                        id = :id
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

    public function update(classAlbum $album, $id, $folder)
    {

        try {

            $sql = "
                
                UPDATE albums
                SET
                        titulo = :titulo,
                        descripcion = :descripcion,
                        autor = :autor,
                        fecha = :fecha,
                        lugar = :lugar,
                        categoria = :categoria,
                        etiquetas = :etiquetas,
                        carpeta = :carpeta
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100); // valor restringido en validación
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR_NATL);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

            // Usamos la función rename para editar el nombre de la carpeta
            rename('images/' . $folder, 'images/' . $album->carpeta);

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
                        descripcion,
                        autor,
                        fecha,
                        categoria,
                        etiquetas
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
                        descripcion,
                        autor,
                        fecha,
                        categoria,
                        etiquetas
                    FROM
                        albumes
                    WHERE
                        CONCAT_WS(  ', ', 
                            id,
                            titulo,
                            descripcion,
                            autor,
                            fecha,
                            categoria,
                            etiquetas)
                        like :expresion
                    ORDER BY 
                        albumes.id
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

    # Validación autor único
    public function validateUniqueAutor($autor)
    {
        try {

            $sql = " 

                SELECT * FROM albums 
                WHERE autor = :autor
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':autor', $autor, PDO::PARAM_STR);
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


    /**
     * Function getFolder
     * -> Obtiene una carpeta mediante su id
     */
    public function getFolder($id_folder)
    {
        try {
            $sql = "
                    SELECT 
                            carpeta
                    FROM 
                            albumes
                    WHERE
                            id = :id
            ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id_folder, PDO::PARAM_INT);

            $pdoSt->setFetchMode(PDO::FETCH_OBJ);

            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }


    /**
     * Function uploadFilesTo
     * //-> Toma como 1er parametro un array asociativo
     */

    public function updateFilesTo($files, $folder)
    {


        // Generamos un array de errores de fichero
        $errorFiles = array(
            0 => 'No hay errores, el archivo se cargó con éxito',
            1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
            2 => 'El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML',
            3 => 'El archivo subido se cargó solo parcialmente',
            4 => 'No se cargó ningún archivo',
            6 => 'Falta una carpeta temporal',
            7 => 'Error al escribir el archivo en el disco.',
            8 => 'Una extensión de PHP detuvo la carga del archivo.',
        );

        $errores = []; // Almacenará los errores encontrados en los archivos

        // Recorremos el array para validar cada archivo
        foreach ($files['name'] as $index => $file) {
            // Validamos que no existan errores
            if ($files['error'][$index] === UPLOAD_ERR_OK) {
                // Validamos el tamaño máximo
                $maxSize = 5 * 1024 * 1024; // calculamos los bytes de 5 megas 
                if ($files['size'][$index] > $maxSize) {
                    $errores[] = 'El tamaño del archivo ' . $file . ' excede el límite de 5MB.';
                }

                // Validamos el tipo de fichero
                $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileInfo = new SplFileInfo($file);
                $extension = $fileInfo->getExtension();

                if (!in_array(strtolower($extension), $extensions)) {
                    $errores[] = "El archivo '$file' no es una imagen JPG, JPEG, PNG o GIF.";
                }

            } else {
                // Almacenamos el codigo de error en el array de errores
                $errores[] = $errorFiles[$files['error'][$index]];


            }
        }

        # Si hay errores en algún archivo, cancelar la subida de todos los files
        if (!empty($errores)) {
            $_SESSION['error'] = implode(PHP_EOL, $errores);
            return; // Terminar el proceso de subida de files
        }

        # Si no hay errores, se procede a mover los files a la carpeta del álbum
        foreach ($files['name'] as $index => $file) {
            move_uploaded_file($files['tmp_name'][$index], 'imagenes/' . $carpeta . '/' . $file);
        }

        # Añadimos un mensaje  de confirmación
        $_SESSION['mensaje'] = "Se han subido correctamente las imagenes";


    }

}

