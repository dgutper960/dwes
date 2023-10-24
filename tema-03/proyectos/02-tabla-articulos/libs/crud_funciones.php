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
            'unidades'=> '106',
            'precio'=> '748'
        ],[
            'id'=> 4,
            'descripcion' => 'LG - Ultra Gear 4k 144.GHz',
            'modelo' => 'LG Ultra Gear',
            'categoria' => '2',
            'unidades'=> '106',
            'precio'=> '748'
        ]
        
        
        ];

    return $articulos;

}




?>