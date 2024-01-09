<?php

/**
 * Creamos la sesion
 */
session_start(); // si hay sesión la mantiene
// evaluamos si existe la variable y en caso negativo la creamos
if (isset($_SESSION['num_visitas_events'])) {
    $_SESSION['num_visitas_events']++; // si existe incrementa el núm de visitas
} else {
    $_SESSION['num_visitas_events'] = 1; // en caso contrario nos contabiliza la primera visita
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1 - pág Events</title>
</head>

<body>

    <ul>
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="about.php">About</a>
        </li>
        <li>
            <a href="services.php">Services</a>
        </li>
        <li>
            <a href="events.php">Events</a>
        </li>
        <li>
            <a href="close.php">Close</a>
        </li>
    </ul>

    <ul>
        <li>Página: Events</li>
        <li>SID:
            <?= session_id(); ?>
        </li>
        <li>Nombre Sesión:
            <?= session_name(); ?>
        </li>
        <li>Fecha/Hora Inicio Sesion:
            <?= $_SESSION['fecha_hora_visita']; ?>
        </li>
        <li>Visitas Events:
            <?= $_SESSION['num_visitas_events']; ?>
        </li>
    </ul>

</body>

</html>