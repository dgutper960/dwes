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
        <legend>Tabla de alumnos</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

        <!-- Notificacion -->
        <?php include 'partials/notificacion.php' ?>

        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostramos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Asignaturtas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <!-- Recorremos el array alumnos y accedemos a las propiedades de cada uno -->
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
                            <?= $alumno->email ?>
                        </td>
                        <td>
                            <?= $alumno->getEdad(); ?>
                        </td>
                        <td>
                            <?= $cursos[$alumno->curso] ?>
                        </td>
                        <td>
                            <?= ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignaturas) ?>
                        </td>
                        <td>
                            <!-- Botón eliminar GET indice -> eliminar.php  -->
                            <a href="eliminar.php?indice=<?= $indice?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar GET indice -> editar.php -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar GET indice -> mostrar.php -->
                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <!-- muestra el n$alumnos (colspan=ocupa n columnas) -->
                    <td colspan="7"><b>Nº de alumnos =
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