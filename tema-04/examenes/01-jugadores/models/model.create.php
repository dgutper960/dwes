<?php

# Obtengo arrays de paises, posiciones y equipos
$paises = TablaJugadores::getPaises();
$posiciones = TablaJugadores::getPosiciones();
$equipos = TablaJugadores::getEquipos();

# Cargo los datos de la tabla
$jugadores = new TablaJugadores();
$jugadores->getDatos();



// obtenemos los datos del jugador
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$contrato = $_POST['contrato'];
$equipoJ = $_POST['equipo'];
$posicionesJ = $_POST['posiciones'];
$paisJ = $_POST['pais'];

// creamos un objeto de Jugador
// mantener el orden de los parametros
$jugadorNuevo = new Jugador(
    $id,
    $nombre,
    $numero,
    $paisJ,
    $equipoJ,
    $posicionesJ,
    $contrato

);

// Añadimos el jugador a la tabla
$jugadores->create($jugadorNuevo);

 # Obtengo la tabla de usuarios mediante método getArray()
$jugadores = $jugadores->getTabla(); 

?>