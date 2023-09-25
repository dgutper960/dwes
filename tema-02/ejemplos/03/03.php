<?php
    // para declarar las variables usamos el $
    // para acceder a ellas tambien hay que poner $
    $usuario = "David Gutiérrez Pérez"

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo-01 - Tema 2</title>
</head>
<body>
    <center>
        <h2>Ejemplo-01 - Tema 2</h2>
    </center>

    <h4>

    <?php

        echo "Hola Mundo"; // Las diferentes líneas del código,';' no dan salto de línea de por sí
        echo "<br>"; // Solo me dará el salto de línea el <br>
        /* Para aceder a la variable dentro del texto, 
        el texto debe estar delimitado por comillas dobles */ 
        echo "Soy $usuario";
        /** Si delimito el texto con comillas simples se debe concatenar con la variable
         * para concatenar se usa el punto */
        echo 'Soy '.$usuario;

    ?>

    </h4>
    
</body>
</html>