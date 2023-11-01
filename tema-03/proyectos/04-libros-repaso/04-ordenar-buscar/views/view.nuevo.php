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
        <!-- Añadimos el formulario para nuevo -->

        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">id</label>
                <input type="number" class="form-control" name="id" aria-describedby="emailHelp">
            </div>
            <!-- titulo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp">
            </div>
            <!-- autor -->
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" aria-describedby="emailHelp">
            </div>
            <!-- genero -->
            <div class="mb-3">
                <label for="autor" class="form-label">Genero</label>
                <input type="text" class="form-control" name="genero" aria-describedby="emailHelp">
            </div>
            <!-- autor -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="decimal" class="form-control" name="precio" aria-describedby="emailHelp">
            </div>
            <!-- botones de acción -->
            <button type="submit" class="btn btn-primary">Añadir</button>
            <button type="reset" class="btn btn-primary">Borar</button>
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </form>

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