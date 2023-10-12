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
        <?php if ($perfil == 1): ?>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Eliminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Actualizar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Consultar</a>
                </li>
            </ul>
        <?php elseif ($perfil == 2): ?>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Nuevo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Actualizar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Consultar</a>
                </li>
            </ul>
        <?php elseif ($perfil == 3): ?>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Consultar</a>
                </li>
            </ul>
        <?php endif; ?>
<!-- 
        <li class="nav-item">
            <a class="nav-link">Disabled</a>
        </li> -->


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>