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
            <span class="fs-6">Act 3.1 Formulario Registro</span>
        </header>

        <legend>Formulario Registro</legend>
        <!-- formulario -->
        <form method="POST" action="acceso.php">

            <!-- usuario -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Entre 8 y 15 caracteres</div>
            </div>
            <!-- email -->
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca un email válido</div>
            </div>
            <!-- password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <!-- password de confirmación-->
            <div class="mb-3">
                <label class="form-label">Confirmar Password</label>
                <input type="password" name="passConfirm" class="form-control" id="exampleInputPassword2">
            </div>

            <!-- perfiles -->
            <select class="form-select" name="perfil" aria-label="Default select example">
                <option selected disabled>Seleccione su Perfil</option>
                <option value="1">Administrador</option> // devuelve el valor de value
                <option value="2">Editor</option> // devuelve el valor de value
                <option value="3">Usuario</option> // devuelve el valor de value
            </select>

            <br>

            <!-- Botones de acción -->
            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        <br>
        <br>
        <br>

        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>