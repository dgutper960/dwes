<?php

    /*

        Controlador: eliminar.php
        Descripción: permite eliminar un elemento de la tabla
    */

    # Cargamos las clases
    include("class/class.articulo.php"); // cuidado con el orden
    include("class/class.arrayArticulos.php");


    # Model
    include 'models/model.eliminar.php';


    # Vista
    include 'views/view.index.php';

?>