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
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" readonly>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos ?>">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $alumno->email ?>">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- fecha_nac -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= $alumno->fecha_nac ?>">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- curso -->
            <div class="mb-3">
                <label class="form-label">Seleccione Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>" <?= ($alumno->curso == $key) ? 'selected' : null ?>>
                            <!-- operador ternario para ver el alumno preseleccionado -->
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Asignaturas -->
            <div class="mb-3">
                <label class="form-label">Seleccione Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indice => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]"
                                <?= (in_array($indice, $alumno->asignaturas) ? 'checked' : null) ?>>
                            <!-- operador ternario para ver los alumnos preseleccionados -->
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>

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