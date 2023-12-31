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

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- cabecera personalizada -->
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Categorias</th>
                    <th class="text-end">Stock</th> <!-- class="text-end" para que salga al final-->
                    <th class="text-end">Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Iteramos y mostramos los detalles de los artículos -->
                        <td><?= $articulo['id'] ?></td>
                        <td><?= $articulo['descripcion'] ?></td>
                        <td><?= $articulo['modelo'] ?></td>
                        <td><?= $marcas[$articulo['marca']] ?></td> <!-- el valor de $articulo['marca'] corresponde al indice de la marca -->
                        <td><?= implode(', ', mostrar_categorias($categorias, $articulo['categorias'])) ?></td> <!-- lo mostramos en un array -->
                        <td class="text-end"><?= $articulo['unidades'] ?></td>
                        <td class="text-end"><?= number_format($articulo['precio'], 2, ',', '.')?> €</td> <!-- [Ndecimales],[separDec],[separMil] -->

                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?id=<?= $articulo['id'] ?>" title="Eliminar">
                            <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?id=<?= $articulo['id'] ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?id=<?= $articulo['id'] ?>" title="Mostrar">
                            <i class="bi bi-card-text"></i></a>

                        </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Artículos
                        <?= count($articulos) ?>
                    </td>
                </tr>
            </tfoot>
        </table>



        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>