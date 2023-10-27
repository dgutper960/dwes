<?php
    // Controlador: buscar.php
    // Descripción: Busca libros mediante expresion de busqueda

    // añadimos la libreria
    include 'libs/crud_funciones.php';

    // Modelo
    include 'models/model.buscar.php';

    // solo nos hará falta la vista con el formulario inicials
    include "views/view.index.php";
?>