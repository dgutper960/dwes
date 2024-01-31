<?php

$alumnos = [
    [
        1.,
        'juan',
        'garcia',
        'molina'
    ],
    [
        2.,
        'pepe',
        'rubio',
        'perez'
    ],
    [
        3.,
        'manolo',
        'garcia garcia',
        'peña'
    ]
];

# Abrimos fichoro, si esxiste -> sibreescribe, Si no existe -> lo crea; a=escritura + binario
$alumnos_csv = fopen("csv/alumnos.scv", "ab");

foreach($alumnos as $alumno){
    fputcsv($alumnos_csv, $alumno, ";");
}
fclose($alumnos_csv);

echo 'Fichero creado con éxito';



