<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 3.2 - Artículos informáticos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book-half"></i>
            <span class="fs-6">Proyecto 3.2 - Artículos informáticos</span>
        </header>

        <legend>Formulario Editar Artículo</legend>

        <!-- Formulario Nuevo Artículo -->
        <form action="update.php?id=<?= $id?>" method="POST">
            <!-- id No lo introduce el usuario (autoincremento) -->

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo['descripcion']?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo['modelo']?>" disabled>
                <!-- <div class="form-text">Introduzca Autor del libro</div> -->
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" class="form-control" name="modelo" value="<?= $categorias[$articulo['categoria']]?>" disabled>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?= $articulo['unidades']?>" disabled>
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= $articulo['precio']?>" disabled>
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>

    </div>
</body>

</html>