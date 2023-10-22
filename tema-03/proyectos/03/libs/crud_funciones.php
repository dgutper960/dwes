<?php

/*
funcion buscar_en_tabla()
descripcion: busca un valor en una determinada columna de una tabla dada
parametros:
    - tabala
    - nombbre de la columna buscada
    - valor a buscar
salida:
    - indice del arrat donde se encuentra el valor
    - false - en caso de que no lo encuentre
*/
function buscar_en_talabla($tabla = [], $columna, $valor){
    $columna_valores = array_column($tabla, $columna);

    return array_search($valor, $columna_valores, false); // false = no busqueda extricta (mayusculas y minusculas)
}

/*
    función: eliminar()
    descripción: elimina un elemento de la tabla
    parámetros:
        - tabla
        - id del elemento de deseo eliminar
    salida:
        - tabla actualizada
*/

// function eliminar(&$tabla = [], $id){
//     /* se debe tomar como argumento el valor por referencia 
//     para que se borre ese elemento de la memoria */
//     foreach($tabla as $registro => $atributo){
//         if($atributo['id'] == $id){
//             unset($tabla[$registro]);
//         }
//     }
// }

// function eliminar($tabla = [], $id){
//     // lista_id => elementos llamados id
//     $lista_id = array_column($tabla, 'id');

//     // buscar id del libro que deseo eliminar
//     $elemento = array_search($id, $lista_id, false); // retorna el indice del valor buscado
    
//     // eliminar el elemento de la tabla
//     unset($tabla[$elemento]);

//     return $tabla;
// }




?>