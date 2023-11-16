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
        <legend>Formulario para añadir alumno</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>


        <!-- Formulario Nuevo Artículo -->
        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>

            <!-- fecha_nac -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <option selected disabled>Selecciona un curso:</option>
                    <?php foreach ($cursos as $key => $marca): ?>
                        <option value="<?= $key ?>">
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Asignaturas -->
            <div class="mb-3">
                <label class="form-label">Seleccionar Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indice => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="asignaturas[]">
                            <!--Al ser múltiples opciones, se deberan recoger dichos valores en un array-->
                            <label class="form-check-label" for="">
                                <?= $asignatura ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>