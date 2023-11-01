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


        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Proyecto 3.1 - Gestión de libros</span>
        </header>

        <legend>Formulario Editar Libro</legend>

        <!-- Añadimos el formulario para nuevo 
        pasamos el id con GET y datos con POST-->
        <form action="update.php?id=<?=$id?>" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="id" class="form-label">id</label> <!-- Añade etiqueta value con el valor del libro correspondiente -->
                <input type="number" class="form-control" name="id" aria-describedby="emailHelp" value="<?= $libro['id']?>" disabled>
            </div>
            <!-- titulo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label> <!-- Añade etiqueta value con el valor del libro correspondiente -->
                <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp" value="<?= $libro['titulo']?>">
            </div>
            <!-- autor -->
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label> <!-- Añade etiqueta value con el valor del libro correspondiente -->
                <input type="text" class="form-control" name="autor" aria-describedby="emailHelp" value="<?= $libro['autor']?>">
            </div>
            <!-- genero -->
            <div class="mb-3">
                <label for="autor" class="form-label">Genero</label> <!-- Añade etiqueta value con el valor del libro correspondiente -->
                <input type="text" class="form-control" name="genero" aria-describedby="emailHelp" value="<?= $libro['genero']?>">
            </div>
            <!-- autor -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label> <!-- Añade etiqueta value con el valor del libro correspondiente -->
                <input type="decimal" class="form-control" name="precio" aria-describedby="emailHelp" value="<?= $libro['precio']?>">
            </div>
            <!-- botones de acción -->
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="reset" class="btn btn-primary">Borar</button>
            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
        </form>

        <!-- Pie de documento -->
        <?php
        include 'layouts/footer.html';
        ?>
    </div>