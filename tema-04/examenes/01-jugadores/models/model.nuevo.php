<?php

# Obtengo arrays de paises, posiciones y equipos
$paises = TablaJugadores::getPaises();
$posiciones = TablaJugadores::getPosiciones();
$equipos = TablaJugadores::getEquipos();

# Cargo los datos de la tabla
$jugadores = new TablaJugadores();
$jugadores->getDatos();

# Obtengo la tabla de usuarios mediante método getArray()
$jugadores = $jugadores->getTabla();

?>