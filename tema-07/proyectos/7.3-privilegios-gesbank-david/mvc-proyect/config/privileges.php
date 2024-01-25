<?php

    /*
        # Perfiles
        1 - Administrador
        2 - Editor
        3 - Registrado

        # Privilegios
        Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar 
        ADMINISTRADOR	SI	    SI	    SI	         SI	        SI      SI
        EDITOR	 	    SI	    SI	    NO	         SI	        SI      SI 
        REGISTRADO	 	NO	    NO	    NO	         SI	        SI      SI


        # Definir privilegios como variables golbales

    */

    /**
     * Determinamos los perfiles que pueden acceder a cada método
     */
    $GLOBALS['cliente']['main'] = [1, 2, 3]; // todos
    $GLOBALS['cliente']['new'] = [1, 2]; // admin y editor
    $GLOBALS['cliente']['edit'] = [1, 2]; // admin y editor
    $GLOBALS['cliente']['delete'] = [1]; // admin
    $GLOBALS['cliente']['show'] = [1, 2, 3]; // todos
    $GLOBALS['cliente']['filter'] = [1, 2, 3]; // todos
    $GLOBALS['cliente']['order'] = [1, 2, 3]; // todos

    $GLOBALS['cuenta']['main'] = [1, 2, 3]; // todos
    $GLOBALS['cuenta']['new'] = [1, 2]; // admin y editor
    $GLOBALS['cuenta']['edit'] = [1, 2]; // admin y editor
    $GLOBALS['cuenta']['delete'] = [1]; // admin
    $GLOBALS['cuenta']['show'] = [1, 2, 3]; // todos
    $GLOBALS['cuenta']['filter'] = [1, 2, 3]; // todos
    $GLOBALS['cuenta']['order'] = [1, 2, 3]; // todos

