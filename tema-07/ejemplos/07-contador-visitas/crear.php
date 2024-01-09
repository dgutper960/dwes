<?php

/*
crear.php

ejemplo creacion de cookie
*/
# Nombre de la cookie
$cookie_nombre = 'nombre';
$cookie_apellidos = 'apellidos';

# Almacena nombre
# Almacena apellidos
# Expira a los 60 min
$nombre = 'David';
$apellidos = 'Gutiérrez Pérez';
$expiracion = time() + 60*60; // indicamos la cantidad de segundos

# Creamos la cookie
setcookie($cookie_nombre, $nombre, $expiracion);
# Creamos la cookie
setcookie($cookie_apellidos, $apellidos, $expiracion);

# mostramos si laa cookie fue creada
if(setcookie($cookie_nombre, $nombre, $expiracion) && setcookie($cookie_apellidos, $apellidos, $expiracion)){
    echo 'Cookie creada correctamente';
}

# Al no tener el parametro especificado, se va a transmitri por protocolos HTTP y HTTPS
# Nombre de la cookie







?>