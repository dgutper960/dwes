<?php

/**
 * Creamos la sesion
 */
session_start();
if(isset($_SESSION['num_visitias_home'])){
    $_SESSION['num_visitias_home']++;
}else{
    $_SESSION['num_visitias_home'] = 1;
}

if(isset($_SESSION['fecha_hora_visita'])){
    $_SESSION['fecha_hora_visita']++;
}else{
    $_SESSION['fecha_hora_visita'] = 1;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1</title>
</head>
<body>

<ul>
    <li>
        <a href="#">Home</a>
    </li>
    <li>
        <a href="#">About</a>
    </li>
    <li>
        <a href="#">Services</a>
    </li>
    <li>
        <a href="#">Events</a>
    </li>
</ul>

<ul>
    <li>Página: Home</li>
    <li>SID: <?=session_id()?></li>
    <li>Nombre Sesón: <?=session_name();?> </li>
    <li>Fecha/Hora Sesion: <?=$_SESSION['fecha_hora_visita']?> </li>
    <li>Visitas Home. <?=$_SESSION['num_visitas_home']?></li>
</ul>
    
</body>
</html>