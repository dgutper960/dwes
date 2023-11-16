<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.html' ?>
        <legend>Formulario Editar Artículo</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>


        <!-- Formulario Nuevo Artículo -->
        <form action="update.php?id=<?= $idEditar ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" value="<?= $articulo->getId(); ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- descripción -->
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo->getDescripcion(); ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Modelo</label>
                <input type="text" class="form-control" value="<?= $articulo->getModelo(); ?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Marca -->
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <select class="form-select" aria-label="Default select example">
                    <?php foreach ($marcas as $key => $marca): ?>
                        <option value="<?= $key ?>" <?= ($articulo->getMarca() == $key) ? 'selected' : null ?> disabled>
                            <!-- operador ternario para ver el articulo preseleccionado -->
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" class="form-control" value="<?= $articulo->getUnidades(); ?>" disabled>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" step="0.01"
                    value="<?= $articulo->getPrecio(); ?>" disabled>
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>

            <!-- Categorías -->
            <div class="mb-3">
                <label class="form-label">Seleccionar Categorías</label>
                <div class="form-control">
                    <?php foreach ($categorias as $indice => $categoria): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="categorias[]"
                                <?= (in_array($indice, $articulo->getCategorias()) ? 'checked' : null) ?> disabled>
                            <!-- operador ternario para ver los articulos preseleccionados -->
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $categoria ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>
        <br>
        <br>
        <br>


    </div>
    <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>