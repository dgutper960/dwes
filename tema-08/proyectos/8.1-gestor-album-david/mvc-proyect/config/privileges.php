<?php

    /*
        # Perfiles
        1 - Administrador
        2 - Editor
        3 - Registrado

        # Privilegios
        Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar 
        ADMINISTRADOR	SI	    SI	    SI	         SI	 SI	 SI
        eDITOR	 	    SI	    SI	    NO	         SI	 SI	SI 
        REGISTRADO	 	NO	    NO	    NO	         SI	 SI 	 SI


        # Definir privilegios como variables golbales

    */

    // Asignamos los permisos en la matriz de variables globales 
    $GLOBALS['album']['main'] = [1, 2, 3]; // todos
    $GLOBALS['album']['new'] = [1, 2]; // administrador y editor
    $GLOBALS['album']['edit'] = [1, 2];// administrador y editor
    $GLOBALS['album']['delete'] = [1]; // administrador
    $GLOBALS['album']['show'] = [1, 2, 3];  // todos
    $GLOBALS['album']['filter'] = [1, 2, 3]; // todos
    $GLOBALS['album']['order'] = [1, 2, 3]; // todos
    $GLOBALS['album']['add'] = [1, 2];// administrador y editor
    $GLOBALS['album']['upload'] = [1, 2];// administrador y editor

