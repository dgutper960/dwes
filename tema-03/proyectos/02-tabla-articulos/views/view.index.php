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

    <!-- cargamos la cabecera de la vista -->
    <?php include 'views/partials/header.php' ?>

    <!-- Cargamos el menú para nuevo, ordenar y buscar -->
    <?php include 'views/partials/menu_print.php' ?>

    <!-- mostramos la tabla de artículos -->
    <table class="table">
        <thead>
            <tr>
                <!-- personalizado -->
                <th>id</th>
                <th>Descripción</th>
                <th>Modelo</th>
                <th>Categoría</th>
                <th class="tex-en">Stock</th>
                <th class="tex-en">Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <!-- extraemos los datos del array -->

            <?php foreach ($articulos as $articulo): ?>
                <tr>
                    <!-- mostramos los valores directamente -->
                    <td><?= $articulo['id'] ?></td>
                    <td><?= $articulo['descripcion'] ?></td>
                    <td><?= $articulo['modelo']?></td>
                    <td><?= $categoria[$articulo['categoria']] ?></td> <!-- el indice de $articulo corresponde al valor del indice $categoría -->
                    <td class="tex-end"><?= $articulo['unidades'] ?></td>
                    <td class="tex-end"><?= number_format($articulo['precio'],2, ', ', ' ');   ?></td>

                </tr>
            <?php endforeach; ?>

            <!-- mostramos los botones -->

        </tbody>

    </table>






    <!-- mostramos el footer -->
    <?php include 'views/partials/footer.html' ?>

    <!-- cargamos el script bootstrap -->
    <?php 'views/layouts/javascript.html' ?>


</body>

</html>