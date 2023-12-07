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
        <legend>Tabla de Corredores</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

        <!-- Notificacion -->
        <?php include 'partials/notificacion.php' ?>

        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Club</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <!-- ACCEDEMOS A LOS ALUMNOS E ITERAMOS -->
                <?php foreach($corredores as $corredor): ?>
                    <tr>
                        <td>
                            <?= $corredor->id ?>
                        </td>
                        <td>
                            <?= $corredor->nombre ?>
                        </td>
                        <td>
                            <?= $corredor->apellidos ?>
                        </td>
                        <td>
                            <?= $corredor->ciudad ?>
                        </td>
                        <td>
                            <?= $corredor->email ?>
                        </td>
                        <td>
                            <?= $corredor->edad ?>
                        </td>
                        <td>
                            <?= $corredor->categoria ?>
                        </td>
                        <td>
                            <?= $corredor->club ?>
                        </td>


                        <td>
                            <!-- Botón eliminar GET id -> eliminar.php  -->
                            <a href="eliminar.php?id=<?= $corredor->id ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar GET id -> editar.php -->
                            <a href="editar.php?id=<?= $corredor->id ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar GET id -> mostrar.php -->
                            <a href="mostrar.php?id=<?= $corredor->id ?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <!-- muestra el n articulos (colspan=ocupa n columnas) -->
                    <td colspan="8"><b>Nº de Corredores =
                            <?= $corredores->rowCount() ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>
                    
        <!-- CERRAMOS LA CONEXIÓN Y RESULTADO -->
        <?php $corredores = null; $conexion->cerrar_conexion(); ?>

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