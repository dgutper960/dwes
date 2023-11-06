<!-- Crear view.mostrar.php a partir de view.nuevo.php -->
<!doctype html>
<html lang="es">

<head>
    <!-- Incluimos HEAD -->
    <?php include("layouts/layout.head.php") ?>
    <title>Añadir Película - CRUD Tabla Películas</title>
</head>

<body>
    <div class="container">

        <!-- Incluimos Cabecera -->
        <?php include("partials/partial.cabecera.php") ?>

        <legend>
            Formulario Nueva Película
        </legend>

        <form action="create.php" method="POST">
            <!-- Campo ID Oculto-->
            <div class="mb3" hidden>
                <label class="form-label">Id</label>
                <input name="id" type="text" class="form-control">
            </div>

            <!-- Campo título -->
            <div class="mb3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" disabled>
            </div>

            <!-- País Select -->
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <select class="form-select" aria-label="Default select example" name="pais" disabled>
                    <option selected disabled>Seleccione País</option>
                    <!-- Generar dinámicamente select  -->
                    <?php foreach ($paises as $key => $value): ?>
                        <option name="pais" value="<?= $key ?>">
                            <?= $value ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Campo director -->
            <div class="mb3">
                <label class="form-label">Director</label>
                <input name="director" type="text" class="form-control" disabled>
            </div>

            <!-- Campo Año -->
            <div class="mb3">
                <label class="form-label">Año</label>
                <input name="año" type="number" class="form-control" disabled>
            </div>

            <!-- Categorías -->
            <div class="mb-3">
                <label class="form-label">Géneros</label>
                <div class="form-control">
                    <!-- Generar dinámicamente lista checkbox de géneros -->
                    <?php foreach($generos as $key => $value): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=" <?= $key ?>" id="flexCheckDefault" disabled>
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $value ?>
                        </label>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <br>
            <div class="mb3" role="group">
                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        <br>
        <br>
        <br>
        <!-- Incluimos Partials footer -->
        <?php include("partials/partial.footer.php") ?>
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <?php include("layouts/layout.javascript.php") ?>
</body>

</html>