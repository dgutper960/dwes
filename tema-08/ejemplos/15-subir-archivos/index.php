<?php
/**
 * Al existir la posibilidad de una no validación
 */

# Iniciamos sesion
session_start();

# Iniciamos los campos del formulario

$nombre = null;
$observaciones = null;
$fichero = null;

# Comprobamos si existen errores
if (isset($_SESSION['error'])) {

    $error = $_SESSION['error'];
    $errores = $_SESSION['errores'];

    # Autocompletamos
    $nombre = $_SESSION['nombre'];
    $observaciones = $_SESSION['ovservaciones'];
    $fichero = $_SESSION['fichero'];

    ## Eliminamos variables de seasion
    unset($_SESSION['error']);
    unset($_SESSION['errores']);
    unset($_SESSION['nombre']);
    unset($_SESSION['ovservaciones']);
    unset($_SESSION['fichero']);

}

# Comprobamos si existen mensajes
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <br><br>

        <!-- Mensaje -->
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Mensaje </strong>
                <?= $mensaje; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </button>
            </div>
        <?php endif; ?>

        <!-- Error -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR </strong>
                <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h1>Formulario Subida de Archivos</h1>
        <!-- Formulario subida -->
        <form action="validar.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto validar tamaño -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">

            <!-- nombre -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1"
                    placeholder="Antonio Molina" value="<?= $nombre ?>">
                <!-- mensaje de error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['nombre'] ??= null ?>
                </span>
            </div>
            <!-- observaciones -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea class="form-control" type="text" name="observaciones" id="exampleFormControlTextarea1"
                    rows="3"><?= $observaciones ?></textarea>
                <!-- mensaje de error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['observaciones'] ??= null ?>
                </span>
            </div>

            <!-- fichero -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Seleccionar Archivo</label>
                <input class="form-control" name="fichero" type="file" id="formFile" accept="image/*"
                    value="<?= $fichero ?>">
                <!-- mensaje de error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['fichero'] ??= null ?>
                </span>
            </div>

            <!-- Botones de accion -->
            <button class=" btn btn-primary" type="submiit">Enviar</button>
            <button class="btn btn-secondary" type="reset">Borrar</button>

        </form>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>