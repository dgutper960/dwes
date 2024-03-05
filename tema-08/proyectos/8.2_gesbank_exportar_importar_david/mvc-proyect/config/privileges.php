<?php
/*
Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar  Exportar  Importar 
ADMINISTRADOR	SI	    SI	    SI	         SI	        SI	    SI          SI      SI
EDITOR	 	    SI	    SI	    NO	         SI	        SI	    SI          SI      SI
REGISTRADO	 	NO	    NO	    NO	         SI	        SI 	    SI          NO      NO

*/

$GLOBALS['clientes']['main'] = [1, 2, 3];
$GLOBALS['clientes']['new'] = [1, 2];
$GLOBALS['clientes']['edit'] = [1, 2];
$GLOBALS['clientes']['delete'] = [1];  /** DELETE */
$GLOBALS['clientes']['show'] = [1, 2, 3];
$GLOBALS['clientes']['filter'] = [1, 2, 3];
$GLOBALS['clientes']['order'] = [1, 2, 3];
$GLOBALS['clientes']['exportar'] = [1,2];
$GLOBALS['clientes']['importar'] = [1,2];  /** IMPORTAR */

$GLOBALS['cuentas']['main'] = [1, 2, 3];
$GLOBALS['cuentas']['new'] = [1, 2];
$GLOBALS['cuentas']['edit'] = [1, 2];
$GLOBALS['cuentas']['delete'] = [1]; /** DELETE */
$GLOBALS['cuentas']['show'] = [1,2,3];
$GLOBALS['cuentas']['filter'] = [1,2,3];
$GLOBALS['cuentas']['order'] = [1,2,3];
$GLOBALS['cuentas']['exportar'] = [1,2];
$GLOBALS['cuentas']['importar'] = [1,2];  /** IMPORTAR */
