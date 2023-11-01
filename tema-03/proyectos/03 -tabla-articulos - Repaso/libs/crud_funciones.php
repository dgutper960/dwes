<?php

# Creamos el la matriz de articulos
function generar_tabla(){
    $articulos = [
        [
            'id' => 1,
            "descripcion"=> "Laptop HP",
            "modelo"=> "Pavilion Gaming 15-ec1010ns",
            "categorias"=> [0],
            "marca"=> 0,
            "unidades"=> "259",
            "precio"=> "1500"
        ],
        [
            'id' => 2,
            "descripcion"=> "Monitor LG",
            "modelo"=> "27GL83A-B",
            "categorias"=> [0, 1],
            "marca"=> 1,
            "unidades"=> "71",
            "precio"=> "594"
        ],
        [
            'id' => 3,
            "descripcion"=> "Impresora HP",
            "modelo"=> "OfficeJet Pro 9015e",
            "categorias"=> [1, 2],
            "marca"=> 0,
            "unidades"=> "48",
            "precio"=> "789"
        ],
        [
            'id' => 4,
            "descripcion"=> "Teclado mecánico",
            "modelo"=> "Corsair K70 RGB MK.2",
            "categorias"=> [0, 2],
            "marca"=> 2,
            "unidades"=> "78",
            "precio"=> "112"
        ],
        [
            'id' => 5,
            "descripcion"=> "Disco duro externo",
            "modelo"=> "Seagate Expansion",
            "categorias"=> [2, 3],
            "marca"=> 3,
            "unidades"=> "89",
            "precio"=> "154"
        ]
    ];

    return $articulos;
}


function generar_id($articulos){
    // array_column -> funcion interna de php
    $array_id = array_column($articulos,"id");
    asort($array_id);
    return end($array_id)+1;
}



# Creamos el array de categoría
function generar_categorias(){
    $categorias = [
        'portatiles',
        'monitores',
        'impresoras',
        'teclados',
        'almacenamiento'
    ];
  # ordenamos el array
    asort($categorias);
    return $categorias;

  

}

function generar_marcas(){
    $marca = [
        'HP',
        'LG',
        'Corsair',
        'Seagate'
    ];

    asort($marca);
    return $marca;
}

// Funcion mostrarCategorias
function mostrar_categorias($categorias, $categoriaArticulo){
    $arrayCategorias = [];
    foreach($categoriaArticulo as $indice){
        $arrayCategorias = $categorias[$indice];
    }
    asort($arrayCategorias);
    return $arrayCategorias;
}




?>