<?php

/*
Generamos la tabla de categorías
*/

function generar_categoria(){

    
    $categorias = [
    
        'Portatiles',
        'PC sobremesa',
        'Componentes',
        'Monitores',
        'Impresoras'
    
    ];
    // ordenamos las categorías 
    asort($categorias);
    // return
    return $categorias;
        
    }


function generar_marca(){

    
$marcas = [

    'Portatiles',
    'PC sobremesa',
    'Componentes',
    'Monitores',
    'Impresoras'

];
// ordenamos las categorías 
asort($marcas);
// return
return $marcas;
    
}

function generar_marcas(){

    
    $marcas = [
    
        'HP',
        'Dell',
        'Apple',
        'Lenovo',
        'Asus',
        'LG',
        'Acer',
        'Cisco'
    
    ];
    // ordenamos las categorías 
    asort($marcas);
    // return
    return $marcas;
        
    }


/*
Generamos la tabla principal
*/
function generar_tabla(){

    $articulos = [

        [
            'id' => 1,
            'descripcion' => 'Portatil - HP 15-DR009',
            'modelo' => 'HP 15',
            'marca' => '0',
            'unidades'=> '120',
            'precio'=> '378'
        
        ],[
            'id'=> 2,
            'descripcion' => 'Portatil - AMD A4-913',
            'modelo' => 'HP 255',
            'marca' => '0',
            'unidades'=> '56',
            'precio'=> '348'
        ],[
            'id'=> 3,
            'descripcion' => 'PC Sobremesa - Lenovo',
            'modelo' => 'Lenovo 255',
            'marca' => '1',
            'unidades'=> '159',
            'precio'=> '748'
        ],[
            'id'=> 4,
            'descripcion' => 'LG - Ultra Gear 4k 144.GHz',
            'modelo' => 'LG Ultra Gear',
            'marca' => '3',
            'unidades'=> '106',
            'precio'=> '168.05'
        ],[
            'id'=> 5,
            'descripcion' => 'Tarjeta gráfica Nvidia',
            'modelo' => 'RTX-4070.ti',
            'marca' => '2',
            'unidades'=> '106',
            'precio'=> '408'
        ],[
            'id'=> 6,
            'descripcion' => 'CPU - Intel Inside 12th',
            'modelo' => 'core i5 128907 - 4.9 GHz',
            'marca' => '2',
            'unidades'=> '216',
            'precio'=> '212'
        ]
        
        
        ];

    return $articulos;

}

// function ultimoID($articulos){  
//     $ultimoID = 0;
//     // recorremos el array
//     foreach ($articulos as $value) {
//         if ($value['id'] > $ultimoID){
//             $ultimoID = $value['id'];
//         }
//     }
//     return $ultimoID;
// }

function generar_id($articulos){

    $array_id = array_column($articulos,'id');
    asort($array_id) ;
    return end($array_id)+1;
}

/*
    Funcion: buscar_en_tabla()
    Descripción: busca un valor en una determinada columna de una tabla
    parametros: 
        -tabla
        -nombre de la columna - busqueda
        -valor - lo que se busca
    salida:
        -indice del array donde se encuentra el valor
        -false -  en caso de no lo encuentre
*/

function buscar_en_tabla($tabla = [], $columna,$valor){
    
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores,false);
}


function nuevo($articulos, $articulo){
    $articulos[] = $articulo;
    return $articulo;
}



?>