<?php

/* Modelo: model.eliminar 
   Descripcion: elimina un libro por id
   
   Metodo GET:
        - id del libro
   
*/
$id = $_GET['id'];

$indice_eliminar = buscar_en_talabla($libros, 'id', $id);
 // comparación estricta que distinge false de 0 en caso del primer indice
if($indice_eliminar !== false){
    // elimina el libro selecionado
    unset($libros[$indice_eliminar]);
    // reconstruye el array 
    $libros = array_values($libros); 
}else{
    echo 'ERROR: LIBRO NO ENCONTRADO';
    exit();
}


?>