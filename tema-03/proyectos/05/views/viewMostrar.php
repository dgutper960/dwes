<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Usaremos una plantilla, que será usada para todos los proyectos -->
    <?php include 'layouts/head.html' ?>
    <title>Proyecto 3.1 - Gestión de libros</title>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book-half"></i>
            <span class="fs-4">Proyecto 3.1 - Gestión de libros</span>
        </header>
        <legend>Detalles del Libro Seleccionado</legend>

        <!-- Menu principal -->
        <?php include 'partials/menu_print.php'; ?>

        <!-- Muestra los datos de la tabla -->
        <table class="table table-light">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Mismo formato a cada campo de la tabla -->
                    <?php foreach ($libro as $campo): ?> <!-- Asociativo -->
                        <td>
                            <?= $campo ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
 
            </tbody>
        </table>

        <!-- Boton de volver -->
        <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        <!-- Pie de documento -->
        <?php
        include 'layouts/footer.html';
        ?>
    </div>


    <!-- js bootstrap 532-->
    <?php
    include 'layouts/javascript.html';
    ?>
</body>

</html>