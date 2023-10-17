<?php

/*
    función: eliminar()
    descripción: elimina un elemento de la tabla
    parámetros:
        - tabla
        - id del elemento de deseo eliminar
    salida:
        - tabla actualizada
*/

function eliminar(&$tabla = [], $id){
    /* se debe tomar como argumento el valor por referencia 
    para que se borre ese elemento de la memoria */
    foreach($tabla as $registro => $atributo){
        if($atributo['id'] == $id){
            unset($tabla[$registro]);
        }
    }
}


?>