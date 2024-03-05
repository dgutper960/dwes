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
                    *
                FROM 
                    albumes
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
                    INSERT INTO albumes (
                        id,
                        titulo,
                        descripcion,
                        autor,
                        fecha,
                        lugar,
                        categoria,
                        etiquetas,
                        carpeta,
                        created_at 
                    )
                    VALUES (
                        null,
                        :titulo,
                        :descripcion,
                        :autor,
                        :fecha,
                        :lugar,
                        :categoria,
                        :etiquetas,
                        :carpeta,
                        now()
  
                    )
            "; // Se debe rellenar la columna de la fecha de creación de forma manual

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 20);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

            // Creamos la carpeta nueva carpeta que parte de images
            mkdir('images/' . $album->carpeta);

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read(int $id)
    {

        try {
            $sql = "
                SELECT
                    *
                FROM 
                    albumes
                WHERE
                    id = :id
                ORDER BY 
                        id
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

    public function update(classAlbum $album, int $id, $folder)
    {

        try {

            $sql = "
                    UPDATE albumes
                    SET
                            titulo =        :titulo,
                            descripcion =   :descripcion,
                            autor =         :autor,
                            fecha =         :fecha,
                            lugar =         :lugar,
                            categoria =     :categoria,
                            etiquetas =     :etiquetas,
                            carpeta =       :carpeta,
                    WHERE
                            id = :id
                    LIMIT 1
                    ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

            // Usamos la funcion rename para cambiar el nombre de la carpeta al del parámetro
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
                    CONCAT_WS(', ', 
                        id,
                        titulo,
                        descripcion,
                        autor,
                        fecha,
                        categoria,
                        etiquetas
                        ) 
                    LIKE :expresion
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

    public function delete(int $id)
    {
        try {

            $sql = "DELETE FROM albumes WHERE id = :id limit 1";
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
     * Método para obtener carpeta mediante su id
     * -> Toma como parámetro el int id de una carpeta
     * -> Retorna un objeto de la carpeta
     */

    public function getFolder(int $id_folder)
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

            # Conectar con la base de datos
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
     * Funcion permite subir imagenes
     * -> Parámetros
     *      - Array de imágenes
     *      - Directorio de subida
     */
    public function uploadFiles($files, $directory)
    {
        // Generamos un array de errores
        $errorFilesArray = [
            0 => 'No hay errores, el archivo se cargó con éxito',
            1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
            2 => 'El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML',
            3 => 'El archivo subido se cargó solo parcialmente',
            4 => 'No se cargó ningún archivo',
            6 => 'Falta una carpeta temporal',
            7 => 'Error al escribir el archivo en el disco.',
            8 => 'Una extensión de PHP detuvo la carga del archivo.',
        ];

        // creamos un array de errores (validación)
        $errores = [];

        // La entrada files, es un array asociativo,  
        // lo recorremos y mostramos el nombre de los ficheros
        foreach ($files['name'] as $index => $fileName) {
            // comprobamos posibles errores
            if ($files['error'][$index] !== UPLOAD_ERR_OK) { // si hay error
                $errores[] = $errorFilesArray[$files['error'][$index]];
            } else {
                // si no hay errores, validamos el tamaño (5MB)
                $maxSize = 5 * 1024 * 1024;
                if ($files['size'][$index] > $maxSize) {
                    $errores[] = 'El archivo subido excede el tamaño límite (5MB)';
                }
                // comprobamos si la extensión corresponde con los requisitos
                $extensionNames = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $fileInfo = new SplFileInfo($fileName);
                $extension = $fileInfo->getExtension(); // toma la extension del archivo
                // comprobamos si la extensión está en el array
                if (!in_array(strtolower($extension), $extensionNames)) {
                    $errores[] = "Tipo de imagen no permitido. La extensión debe ser: jpg, jpeg, png, webp o gif";
                }
            }
        }

        // En caso de errores, se cancela la subida por completo
        if (empty($errores)) {
            // Si todo va bien, se mueven los ficheros a la carpeta de destino
            foreach ($files['name'] as $index => $fileName) {
                $destination = 'images/' . $directory . '/' . $fileName;
                if (!file_exists($destination)) {
                    if (move_uploaded_file($files['tmp_name'][$index], $destination)) {
                        // Mostramos mensaje de feedback al usuario
                        $_SESSION['mensaje'] = "Las imágenes han sido agregadas al album de forma correcta";
                    } else {
                        $errores[] = "Error al mover el archivo: $fileName";
                    }
                } else {
                    $errores[] = "El archivo $fileName ya existe en el directorio de destino";
                }
            }
        } else {
            $_SESSION['error'] = $errores;
        }
    }


    // Método viewIncrement()
    // Increamenta columna núm_vistitas en la BBDD del album asociado
    public function numViewIncrement(int $id)
    {
        try {
            // Creamos la consulta sql
            $sql = "UPDATE albumes SET num_visitas=num_visitas+1 WHERE id = :id limit 1";

            // Creamos la conexión
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':id', $id);

            // Ejecutamos la consulta
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Function getAlbumProp()
    // Obtiene propiedades del album
    // id album como entrada
    public function getAlbumProp($id)
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
                    num_fotos,
                    num_visitas,
                    carpeta
                FROM  
                    albumes  
                WHERE
                    id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    // Function numPhotosUpdate()
    //-> Actualiza el num de fotos de un album en la BBDD
    // Parametros (id_album, num_fotos)
    public function numPhotosUpdate(int $id_album, int $num_photos)
    {
        try {
            $sql = "UPDATE albumes SET num_fotos = :num_photos WHERE id = :id_album";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':num_photos', $num_photos, PDO::PARAM_INT);
            $pdost->bindParam(':id_album', $id_album, PDO::PARAM_INT);
            $pdost->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}
