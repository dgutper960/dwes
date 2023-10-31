<!DOCTYPE html>
<html lang="es">

<head>
    <!-- cargamos la cabecera de metadatos -->
    <?php include 'views/layouts/head.html' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 3.2 Gestion de artículos</title>

</head>

<body>

    <div class="container">

        <form action="create.php" method="POST">
            <!-- Descripcion -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Marca Select -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Seleccione Marca</label>
                <!-- creamos un selctor de marca desplegable y dinamico -->
                <select class="form-select" name="marca">
                    <option select disabled>Seleccione una marca</option>
                    <?php foreach($marcas as $key => $value): ?>
                        <option value="<?= $key ?>"
                        >
                        <?= $value ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades</label>
                <input type="text" name="unidades" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Categorías -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Seleccione Categoría</label>
                <!-- creamos un selctor de categoría desplegable y dinamico -->
                <select class="form-select" name="categoria">
                    <option select disabled>Seleccione una categoría</option>
                    <?php foreach($categorias as $key => $value): ?>
                        <option value="<?= $key ?>"
                        >
                        <?= $value ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Añadir</button>
            <button type="reset" class="btn btn-primary">Borrar</button>
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
            
        </form>

        <br>
        <br>
        <br>


    <!-- mostramos el footer -->
    <?php include 'views/partials/footer.html' ?>

    <!-- cargamos el script bootstrap -->
    <?php 'views/layouts/javascript.html' ?>


    </div>


</body>

</html>