<?php

/**
 * Creamos la sesion
 */
session_start(); // si hay sesión la mantiene

// inicializamos la variable de sesión con la fecha y hora actual (fin de sesión)
$_SESSION['fecha_hora_fin'] = date("d-m-Y H:i:s");

// Almacenamos la diferencia entre ambas fechas, usando la funcion date_diff
// Debemos usar instancias de DateTime y luego extraemos la diferencia con date_diff
$fecha_fin = new DateTime($_SESSION['fecha_hora_fin']);
$fecha_visita = new DateTime($_SESSION['fecha_hora_visita']);

// Una vez caalculada la diferencia entre fechas, le damos el formato deseado
$_SESSION['duracion_sesion'] = date_diff($fecha_fin, $fecha_visita)->format("%y años, %m meses, %d días, %H horas, %i minutos, %s segundos");

// Controlamos la posiblilidad de que alguna de las páginas no sea visitada
$_SESSION['num_visitas_home'] = isset($_SESSION['num_visitas_home']) ? $_SESSION['num_visitas_home'] : 0;
$_SESSION['num_visitas_about'] = isset($_SESSION['num_visitas_about']) ? $_SESSION['num_visitas_about'] : 0;
$_SESSION['num_visitas_services'] = isset($_SESSION['num_visitas_services']) ? $_SESSION['num_visitas_services'] : 0;
$_SESSION['num_visitas_events'] = isset($_SESSION['num_visitas_events']) ? $_SESSION['num_visitas_events'] : 0;


// Almacenamos el total de visitas del sitio web
$_SESSION['total_visitas'] =
    $_SESSION['num_visitas_home']
    +
    $_SESSION['num_visitas_about']
    +
    $_SESSION['num_visitas_services']
    +
    $_SESSION['num_visitas_events'];

// Cerramos la sesion



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1 - pág Close</title>
</head>

<body>

    <ul>
        <li>
            <a href="index.php">Nuevo Inicio Sesión</a>
        </li>
    </ul>

    <ul>
        <li>Página: Close</li>
        <li>SID:
            <?= session_id(); ?>
        </li>
        <li>Nombre Sesión:
            <?= session_name(); ?>
        </li>
        <li>Total Visitas Sitio Web.
            <?= $_SESSION['total_visitas']; ?>
        </li>
        <li>Fecha/Hora Inicio Sesion:
            <?= $_SESSION['fecha_hora_visita']; ?>
        </li>
        <li>Fecha/Hora Fin Sesion:
            <?= $_SESSION['fecha_hora_fin']; ?>
        </li>
        <li>Duración de la Sesion:
            <?= $_SESSION['duracion_sesion']; ?>
        </li>
    </ul>

</body>

</html>

<?php
 # elimino la sesión
 session_destroy(); // elimina el SID pero no la cookie, ni las variables de sesion
 session_unset(); // elimina todas las variables de sesión

?>