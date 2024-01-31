<?php

/**
 * Ejemplo de valiidación desde el servidor
 */
# Iniciamos sesion
session_start();

# Saneamiento del formulario
$nombre = filter_var($_POST['nombre'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
$observaciones = filter_var($_POST['observaciones'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);

# Cargamos el fichero
$fichero = $_FILES['fichero']; // en caso de tener varios fichero todos iriran en un array

# Genero el array de errores
$FileUploadErrors = array(

    0 => 'No hay error, fichero subido con éxito',
    1 => 'El fichero subido excede la directiva upload_max_filesize de php.ini.',
    2 => 'El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.',
    3 => 'El fichero fue sólo parcialmente subido.',
    4 => 'No se subió ningún fichero.',
    6 => 'Falta la carpeta temporal.',
    7 => 'No se pudo escribir el fichero en el disco.',
    8 => 'Una extensión de PHP detuvo la subida de ficheros.'

);

# Validacion

$errores = [];

if (($fichero['error']) !== UPLOAD_ERR_OK) {

    # Comprobamos que error se ha producido
    if(is_null($fichero)){
        $errores['fichero'] = $FileUploadErrors[1];
    }else{
        $errores['fichero'] = $FileUploadErrors[$fichero['error']];
    }


} else if (is_uploaded_file($fichero['tmp_name'])) 
    # Si el archivo se ha subido, validamos
    // tamaño
    $max_tamanyo = 2 * 1024 * 1024; //-> para max 2 megas

    if ($fichero['size'] > $max_tamanyo) {
        $errores['fichero'] = 'Tamaño de archivo superior al límite (máx 2MB)';
    }

    // tipo de archivo (SplFileInfo investiga el contenido en busca de spcritps)
    $info = new SplFileInfo($fichero['name']); // parámetro -> nombre original del archivo
    $tipos_permitidos = ['JPG', 'GIF', 'PNG']; // en caso de documentos es lo mimo
    // pasamos las cadenas a mayousculas en caso de extensiones cno minuscluas y comprovamos si no está en el array de permitidos
    if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
        $errores['fichero'] = 'Tipo de archivo no permitido. Solo JPG, PNG y GIF';
    }

    // comprobamos si esxisten errores
    if(!empty($errores)){
        # Formulario no validado

        # Creamos la variaable de sesion 
        $_SESSION['error'] = 'Formulario no validado';
        $_SESSION['errores'] = $errores;

        # Variables para el autocompletado
        $_SESSION['nombre'] = $nombre;
        $_SESSION['ovservaciones'] = $observaciones;
        $_SESSION['fichero'] = $fichero;

        // # Lo mandamos pa su casa
        // header('location: index.php');
    } else{
        # Mover fichero desde temporal
        move_uploaded_file($fichero['tmp_name'], 'files/'.$fichero['name']);

        # Generamos mensaje de feedback
        $_SESSION['mensaje'] = 'Archivo subido correctamente';

        // # regreso al formulario
        // header('location: index.php');

    }
    header('location: index.php');



