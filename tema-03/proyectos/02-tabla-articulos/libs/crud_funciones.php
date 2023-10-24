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

return $categorias;
    
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
            'categoria' => '0',
            'unidades'=> '120',
            'precio'=> '378'
        
        ],[
            'id'=> 2,
            'descripcion' => 'Portatil - AMD A4-913',
            'modelo' => 'HP 255',
            'categoria' => '0',
            'unidades'=> '56',
            'precio'=> '348'
        ],[
            'id'=> 3,
            'descripcion' => 'PC Sobremesa - Lenovo',
            'modelo' => 'Lenovo 255',
            'categoria' => '1',
            'unidades'=> '159',
            'precio'=> '748'
        ],[
            'id'=> 4,
            'descripcion' => 'LG - Ultra Gear 4k 144.GHz',
            'modelo' => 'LG Ultra Gear',
            'categoria' => '3',
            'unidades'=> '106',
            'precio'=> '168.05'
        ],[
            'id'=> 5,
            'descripcion' => 'Tarjeta gráfica Nvidia',
            'modelo' => 'RTX-4070.ti',
            'categoria' => '2',
            'unidades'=> '106',
            'precio'=> '408'
        ],[
            'id'=> 6,
            'descripcion' => 'CPU - Intel Inside 12th',
            'modelo' => 'core i5 128907 - 4.9 GHz',
            'categoria' => '2',
            'unidades'=> '216',
            'precio'=> '212'
        ]
        
        
        ];

    return $articulos;

}

function ultimoID($articulos){  
    $ultimoID = 0;
    // recorremos el array
    foreach ($articulos as $value) {
        if ($value['id'] > $ultimoID){
            $ultimoID = $value['id'];
        }
    }
    return $ultimoID;
}




?>