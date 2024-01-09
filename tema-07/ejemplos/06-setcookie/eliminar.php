<?php

/*
eliminar.php

ejemplo eliminar cookie
*/

# Eliminamos las cookies
setcookie('nombre', '', time() - 3600);
setcookie('apellidos', '', time() - 3600);
echo 'Cookies eliminadas correctamente'




?>