<?php

/* Modelo: model.eliminar */

$indice_eliminar = buscar_en_talabla($libro, $id, 3);

if($indice_eliminar){
    unset($libros[$indice_eliminar]);
}else{
    echo 'ERROR: LIBRO NO ENCONTRADO';
    exit();
}


?>