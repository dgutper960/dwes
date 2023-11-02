<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 3.2 - Gestión Artículos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla Artículos</legend>

        <!-- Menu Principal -->
        <?php include 'views/partials/menu.php' ?>

        <form action="create.php" method="POST">
            <!-- Descripcion -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control">
            </div>

            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control">
            </div>
            <!-- Marca Lista Desplegable creada dinámicamente -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" name="marca" aria-label="Default select example">
                    <option selected disabled>Seleccione una Marca</option>
                    <!-- iteramos las marcas -->
                    <?php foreach ($marcas as $key => $marca): ?>
                        <!-- value se recoge con POST, marca se muestra -->
                        <option value="<?= $key ?>">
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>


            <!-- Stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Unidades</label>
                <input type="number" name="unidades" class="form-control">
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" name="precio" class="form-control" step="0.01">
            </div>

            <!-- Categoría en CheckBox retorna un array -->
            <div class="mb-3">
                <label class="form-label">Seleccionar Categorías</label>
                <div class="form-control">
                    <?php foreach ($categorias as $indice => $categoria): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="categorias[]">
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $categoria ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Añadir</button>
            <button type="reset" class="btn btn-primary">Borrar</button>
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </form>

        <br>
        <br>
        <br>



        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>