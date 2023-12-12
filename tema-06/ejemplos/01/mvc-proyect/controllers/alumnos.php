<?php

    class Alumnos Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        } // no es necesario pero lo dejamos por convención

        function render() {

            $this->view->render('main/index');
        }
    }
