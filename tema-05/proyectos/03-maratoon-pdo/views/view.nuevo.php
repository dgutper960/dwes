<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.html' ?>

        <legend>Formulario Nuevo Corredor</legend>

        <!-- Formulario Nuevo Libro -->
        <form action="create.php" method="POST">
            <!-- El id lo vamos a mandar a la BBDD como null, ya que esa columna es int autoincrement -->
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <!-- Ciudad -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <!-- Sexo DEBE MOSTRAR UN CHECKBOX ESTÁTIOCO-->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                    value="M">
                <label class="form-check-label" for="sexo">Mujer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                    value="H">
                <label class="form-check-label" for="sexo">Hombre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio3"
                    value="">
                <label class="form-check-label" for="sexo">No especificar</label>
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <!-- Dni -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <!-- Lista dinámica Categoría -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoría</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria">
                    <option selected disabled>Seleccione Categoría</option>
                    <!-- Generamos la lista dinámica de Categorías -->
                    <?php foreach ($caregorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>">
                            <?= $categoria['nombrecorto'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Lista dinámica Club -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Club</label>
                <select class="form-select" aria-label="Default select example" name="id_club">
                    <option selected disabled>Seleccione Club</option>
                    <!-- Generamos la lista dinámica de Categorías -->
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>">
                            <?= $club['nombrecorto'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>