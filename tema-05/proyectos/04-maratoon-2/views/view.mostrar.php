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

        <legend>Formulario Editar Corredor</legend>

        <!-- Formulario Nuevo Libro -->
        <form action="update.php?id_editar=<?= $id_editar ?>" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $corredor->nombre ?>" disabled>
            </div>
            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $corredor->apellidos ?>" disabled>
            </div>
            <!-- Ciudad-->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?= $corredor->ciudad ?>" disabled>
            </div>
            <!-- $fechaNacimiento -->
            <div class="mb-3">
                <label for="$fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?= $corredor->fechaNacimiento ?>" disabled>
            </div>

            <!-- Sexo -->
            <!-- Definimos checkbox estática -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                    value="M" <?= 'M' === $corredor->sexo ? 'selected' : null ?>  disabled>
                <label class="form-check-label" for="inlineRadio1">Mujer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                    value="H" <?= 'H' === $corredor->sexo ? 'selected' : null ?>  disabled>
                <label class="form-check-label" for="inlineRadio2">Hombre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="inlineRadio3"
                    value=" " <?= ' ' === $corredor->sexo ? 'selected' : null ?>  disabled>
                <label class="form-check-label" for="inlineRadio3">Sin especificar</label>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $corredor->email ?>" disabled>
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $corredor->dni ?>" disabled>
            </div>

            <!-- Categoría Select -->
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Seleccione Categoría</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id']?>" <?= $categoria['id'] === $corredor->id ? 'selected' : null?> disabled>
                            <?= $categoria['nombrecorto'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Club Select -->
            <div class="mb-3">
                <label for="id_club" class="form-label">Seleccione Club</label>
                <select class="form-select" aria-label="Default select example" name="id_club">
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= $club['id'] === $corredor->id ? 'selected' : null ?> disabled>
                            <?= $club['nombrecorto'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>


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