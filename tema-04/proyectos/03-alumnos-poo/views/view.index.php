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
        <legend>Tabla con Artículos Informáticos</legend>

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
                    <th scope="col">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col" class="text-end">Asignaturas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php foreach ($alumnos->getTabla() as $indice => $alumno): ?>
                    <tr>
                        <th>
                            <?= $alumno->id ?>
                        </th>
                        <td>
                            <?= $alumno->nombre ?>
                        </td>
                        <td>
                            <?= $alumno->apellidos ?>
                        </td>
                        <td>
                            <?= $alumno->getEdad()?>
                        </td>
                        <td>
                            <?= $cursos[$alumno->curso] ?>
                        </td>
                        <td> <!-- metodo estatico mostrar categoría -->
                            <?= implode(', ', ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignaturas)) ?>
                        </td>

                        <td>
                            <!-- Botón eliminar GET id -> eliminar.php  -->
                            <a href="eliminar.php?id=<?= $indice?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar GET id -> editar.php -->
                            <a href="editar.php?id=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar GET id -> mostrar.php -->
                            <a href="mostrar.php?id=<?= $indice ?>" title="Mostrar">
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
                    <td colspan="7"><b>Nº de Alumnos =
                            <?= count($alumnos->getTabla()) ?>
                        </b></td>
                </tr>
            </tfoot>
        </table>

    </div>

    <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>