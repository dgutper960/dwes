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
        <legend>Formulario para editar alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>


        <!-- Formulario Nuevo Artículo -->
        <form action="update.php?indice=<?= $indiceEditar ?>" method="POST">
        
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos ?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $alumno->email ?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- fecha_nac -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha Nacimiento</label>
                <input type="text" class="form-control" name="fecha" value="<?= $alumno->fecha_nac ?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- curso -->
            <div class="mb-3">
                <label class="form-label">Seleccione Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>" <?= ($alumno->curso == $key) ? 'selected' : null ?> disabled>
                            <!-- operador ternario para ver el alumno preseleccionado -->
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Asignaturas -->
            <!-- fecha_nac -->
            <div class="mb-3">
                <label for="asignaturas" class="form-label">Asignaturas</label>
                <input type="text" class="form-control" value="<?= ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignaturas) ?>" disabled>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>
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