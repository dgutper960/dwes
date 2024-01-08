<?php

# Continuamos con la sesion
session_start();


# Mostramos los valores del array $_SESSION
print_r($_SESSION);

# Mostramos los valores por separado
echo '<BR>';
echo $_SESSION['nombre'];
echo '<BR>';
echo $_SESSION['apellidos'];
echo '<BR>';
echo $_SESSION['id'];

/**
 * Para que estas variables sean visibles debo navegar previamente por el fichero variables
 */

?>