<?php
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

/*
    Funcion: generar_tabla()
    Descripción: genera la tabla de datos con la que vamos a trabajar

    salida:
        -tabla de datos
*/
function generar_tabla() {

    $libros = [
        [
            'id' => 1,
            'titulo' => 'El Arte de la Cocina Creativa',
            'autor' => 'Sofia Ramírez',
            'genero' => 'Cocina',
            'precio' => 9.99
        ],
        [
            'id' => 2,
            'titulo' => 'La Ciudad de los Sueños Perdidos',
            'autor' => 'Daniel Sánchez',
            'genero' => 'Fantasía',
            'precio' => 19.99
        ],
        [
            'id' => 3,
            'titulo' => 'Domina PHP en una Semana',
            'autor' => 'María Rodríguez',
            'genero' => 'Programación',
            'precio' => 29.99
        ],
        [
            'id' => 4,
            'titulo' => 'Vida y obra de Chiquito de la Calzada',
            'autor' => 'Ian Gibson',
            'genero' => 'Biografía',
            'precio' => 199.99
        ],
        [
            'id' => 5,
            'titulo' => 'JavaScript en Acción: Avanzado',
            'autor' => 'Luisa Sánchez',
            'genero' => 'Programación',
            'precio' => 24.99
        ],
        [
            'id' => 6,
            'titulo' => 'Secretos en la Oscuridad',
            'autor' => 'Ana López',
            'genero' => 'Suspense',
            'precio' => 14.99
        ],
        [
            'id' => 7,
            'titulo' => 'Desarrollo Web con PHP y MySQL: Guía Completa',
            'autor' => 'Carlos Ruiz',
            'genero' => 'Programación',
            'precio' => 7.99
        ],
        [
            'id' => 8,
            'titulo' => 'Como pasar el Ghosts\'n Goblins con una moneda',
            'autor' => 'Spinecard',
            'genero' => 'Ciencia Ficción',
            'precio' => 9.99
        ]
    ];

    return $libros;

}




?>