<?php


/***
 * Perfiles
*   1 - Administrador
*   2 - Editor
*   3 - Registrado
 */

 /**
  * Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar 
* ADMINISTRADOR	 	SI	   SI	        SI	   SI	     SI	      SI
* EDITOR	 	         SI	   SI	        NO	   SI	     SI	      SI 
* REGISTRADO	 	   NO	   NO	        NO	   SI	     SI 	      SI
  */

 # Difinir variables globales para los privilegios
    //  Su ámbito de uso es cualquier parte del proyecto
    $GLOBALS['alumno']['main'] = ['1, 2, 3'];
    $GLOBALS['alumno']['new'] = ['1, 2'];
    $GLOBALS['alumno']['edit'] = ['1, 2'];
    $GLOBALS['alumno']['delete'] = ['1'];
    $GLOBALS['alumno']['show'] = ['1, 2, 3'];
    $GLOBALS['alumno']['filter'] = ['1, 2, 3'];
    $GLOBALS['alumno']['order'] = ['1, 2, 3'];

    /**
     * Para otros recursos del sitio cambiaríamos el primer indice por el nuevo recurso
     */

   

