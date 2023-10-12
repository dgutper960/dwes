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
            <i class="bi bi-building-fill-up"></i>
            <span class="fs-6">Actividad 3.1 - Vista resultado</span>
        </header>

        <legend>Opciones</legend>

        <!-- menu -->
        <!-- Hacemos una única consulta ifelse que abarque todas las posibilidades -->
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

        <legend>Detalles del Usuario</legend>

        <!-- Mostramos los datos introducidos por el Usuario -->
        <table class="table table-success table-striped">
            <tr>
                <th>Nombre Usuario</th>
                <td><?= $usuario ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?= $password ?></td>
            </tr>
            <tr>
                <th>Password de confirmación</th>
                <td><?= $passConfirm ?></td>
            </tr>
        </table>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>