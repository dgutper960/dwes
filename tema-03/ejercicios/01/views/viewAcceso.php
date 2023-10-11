<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html'; ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Actividad 3.1 - Vista resultado</span>
        </header>

        <legend>Detalles del Usuario</legend>

        <!-- menu -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Eliminar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Actualizar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Consultar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Disabled</a>
            </li>
        </ul>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>