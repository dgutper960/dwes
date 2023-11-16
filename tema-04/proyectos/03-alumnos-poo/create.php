<?php

    /*

        Controlador: create.php
        Descripción: permite añadir a la tabla un nuevo artículo
        a partir de los detalles del formulario. Luego los muestra
        en  pantalla  mediante la  vista principal.
    */

    # Clases -> Cargamos las clases
    include 'class/class.alumno.php';
    include 'class/class.arrayAlumnos.php';

    # Model
    include 'models/model.create.php';

    # Vista
    include 'views/view.index.php';

?>