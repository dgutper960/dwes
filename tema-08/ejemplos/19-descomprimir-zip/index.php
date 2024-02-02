<?php

/**
 * Debemos habilitar la directiva extension=zip en PHP.init (Apache -> Config de XAMPP)
 * -> Buscar la directiva y descomentarla eliminando el ;
 */

/// creamos el objeto del la clase zipArchive
$zip = new ZipArchive();

// abrimos con el metodo de la clase, si no existe lo crea, si existe lo machaca
// el método opne devuelve 0 si no puede abrir
if($zip->open('files.zip', ZipArchive::CREATE) === true){ // decimos que queremos abrirlo para crearlo

    // usamos glob para abrir (en un array) todo el contenido de una carpeta
    $files = glob('files/*');


    // recorremos el array
    foreach($files as $file){
        $zip->addFile($file);
    }

    $zip->close();
    echo 'archivo descomprimido correctamente';
} else{
    echo 'Algo ha salido mal';
}
