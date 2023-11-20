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
                    <th scope="col">Alumno</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Población</th>
                    <th scope="col">DNI</th> 
                    <th scope="col">Edad</th> 
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <!-- ACCEDEMOS A LOS ALUMNOS E ITERAMOS -->
                <?php while ($alumno = mysqli_fetch_assoc($alumnos)): ?> <!-- podemos poner directamente el objeto results ($alumnos) en un foreach -->
                    <tr>
                        <td>
                            <?= $alumno['id'] ?>
                        </td>
                        <td>
                            <?= $alumno['alumno'] ?> <!-- al haber echo un concat, el atributo alumno contiene el nombre y apellido -->
                        </td>
                        <td>
                            <?= $alumno['email'] ?>
                        </td>
                        <td>
                            <?= $alumno['telefono'] ?>
                        </td>
                        <td>
                            <?= $alumno['poblacion'] ?>
                        </td>
                        <td>
                            <?= $alumno['dni'] ?>
                        </td>
                        <td class="text-end">
                            <?= $alumno['edad'] ?> 
                        </td>
                        <td>
                            <?= $alumno['curso'] ?>
                        </td>


                        <td>
                            <!-- Botón eliminar GET id -> eliminar.php  -->
                            <a href="eliminar.php?id=<?= $alumno['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar GET id -> editar.php -->
                            <a href="editar.php?id=<?= $alumno['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar GET id -> mostrar.php -->
                            <a href="mostrar.php?id=<?= $alumno['id'] ?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <!-- muestra el n articulos (colspan=ocupa n columnas) -->
                    <td colspan="7"><b>Nº de Alumnos =
                            <?= $alumnos->num_rows ?> <!-- num_rows es una propiedad de la clase mysqli_results -->
                        </b></td>
                </tr>
            </tfoot>
        </table>

        <!-- DEBEMOS LIBERAR RECURSOS POR SEGURIDAD -->
        <?= mysqli_free_result($alumnos) ?>

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