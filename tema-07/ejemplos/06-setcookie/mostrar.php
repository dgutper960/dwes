<?php

/*
mostrar.php

ejemplo mostrar datos de la cookie
*/
# Comprobamos si la cookie existe
if (isset($_COOKIE['nombre']) && isset($_COOKIE['apellidos']) ) {
    # Accedemos al array
    echo $_COOKIE['nombre'];
    echo '<BR>';
    echo $_COOKIE['apellidos'];
    echo '<BR>';
    echo 'Datos Mostraados';

    # Lo mostramos en formato de array
    print_r($_COOKIE['nombre']);
    echo '<BR>';
    print_r($_COOKIE['apellidos']);
}else{
    echo 'Las cookies no existe en este momento';
}



?>