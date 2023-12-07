<?php

/**
 * Model View Index
 * modelo para mostrar los corredoeres en la vista principal
 */
# Instanciamos un objeto de la clase Corredores
    // Ejecuta la conexión
    $conexion = new Corredores();

# Extraemos los valores de la BBDD
    // Llamada al método getCorredores de Alumnos
    $corredores = $conexion->getCorredores(); 
    // realiza la consulta sql 
    // y cada elemento es un objeto cuyos atributos coinciden con las columnas de la consulta
    


?>