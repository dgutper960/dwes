<?php

/* Modelo: model.editar 
   Descripcion: edita un libro por id
   
   Metodo GET:
        - id del libro
   
*/
$id = $_GET['id'];

$indice_editar = buscar_en_talabla($libros, 'id', $id);
 // comparación estricta que distinge false de 0 en caso del primer indice
if($indice_editar !== false){
    // edita el libro seleccionado
    $libros = $libros[$indice_editar];
    

}else{
    echo 'ERROR: LIBRO NO ENCONTRADO';
    exit();
}


?>