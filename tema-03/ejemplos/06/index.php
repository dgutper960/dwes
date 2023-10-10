<?php

$perfil = 'NOadministrador';

?>


<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plantilla HTML -BOOTSTRAP</title>

<!-- CSS boottrap 532 EN EL HEAD -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Instalamos iconos (desde la web, icons/install) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- Cabecera -->
        <BS5-header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-bootstrap"></i>
            <!-- Ponemos el nombre de la actividad -->
            <span class="fs-4">Plantilla Bootstrap</span>
            <br>
            <br>
        </BS5-header>

        <!-- Insertamos código -->
        <!-- posicionamiento para el SEO -->
        <!-- con la etiqueta nav indicamos al SEO que hay un menú -->
        <nav>
            <!-- insertamos la plantilla de bootstrap -->
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Artículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
                <!-- Insertamos estructura if -->
                <?php if ($perfil == 'administrador'): ?>
                    <!-- Opción solo visible para el perfil de administrador -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                <!-- El bloque if debe cerrarse -->
                <?php endif; ?>

            </ul>

        </nav>


        <!-- Pie del documento -->
        <footer class="footer mt-auto py-3 fixed-bottom bg-light">
            <div class="container">


                <span class="text-muted">&copi2023
                    David Gutiérrez Pérez - DWES - 2º DAW - Curso 23/24
                </span>

            </div>

        </footer>

    </div>


    <!-- javascript bootrap 532 AL FINAL DEL BODY -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>