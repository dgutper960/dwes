<?php

    class Alumno Extends Controller {

        function __construct() { /**Descriptivo */

            parent ::__construct();
            
            
        } // no es necesario pero lo dejamos por convención

        /*** Este método se carga de forma automática si no se especifica segundo parámetro en la url */
        function render() { /** Vista acociada a este controlador */

            $this->view->render('alumno/main/index');
        }
    }
