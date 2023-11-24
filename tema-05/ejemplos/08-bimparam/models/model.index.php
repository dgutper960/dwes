<?php

/**
 * Modelo Principal index
 */

# insertar registro en la tabla cursos de bbdd fp
$curso = new Curso();


$curso->nombre = "Primero Desarrollo de Aplicaciones Multiplataforma";
$curso->ciclo = "Desarrollo de Aplicaciones Multiplataforma";
$curso->nombreCorto = "DAM";
$curso->nivel = "1";

# Conectamos con la BBDD
$fp = new FP();
$fp->insert_curso($curso);

echo"Curso insertado corectamente";


?>