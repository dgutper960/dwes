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
    $zip->addFile('files/fichero1.jpg');
    $zip->addFile('files/fichero2.jpg');
    $zip->addFile('files/fichero3.jpg', 'files/afoto_3.jpg');
    $zip->addFile('files/fichero4.jpg');
    $zip->addFile('files/fichero5.jpg', 'afoto_5.jpg');
    $zip->addFile('files/fichero5.jpg', 'files/imagen_5.jpg');
    $zip->addFile('files/fichero6.jpg');
    $zip->addFile('files/fichero7.jpg');
    $zip->addFile('files/fichero8.jpg');

    $zip->close();
    echo 'archivo comprimido correctamente';
} else{
    echo 'Algo ha salido mal';
}
