<!-- Crear view.mostrar.php a partir de view.nuevo.php -->
<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos HEAD -->
  <?php include("layouts/layout.head.php") ?>
  <title>Mostar Alumno - CRUD Tabla Alumnos</title>
</head>

<body>
  <div class="container">

    <!-- Incluimos Cabecera -->
    <?php include("partials/partial.cabecera.php") ?>

    <legend>
      Mostar Alumno
    </legend>

    <form>
      <!-- Campo ID Oculto-->
      <div class="mb3" hidden>
        <label class="form-label">Id</label>
        <input name="id" type=number class="form-control" value="<?= $alumno->id?>" disabled>
      </div>

      <!-- Campo Nombre -->
      <div class="mb3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= $alumno->nombre?>" disabled>
      </div>


      <!-- Campo Apellidos -->
      <div class="mb3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="<?= $alumno->apellidos?>" disabled>
      </div>

      <!-- Campo Email -->
      <div class="mb3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $alumno->email?>" disabled>
      </div>

      <!-- Campo Telefono -->
      <div class="mb3">
        <label class="form-label">Telefono</label>
        <input type="number" name="telefono" class="form-control" value="<?= $alumno->telefono?>" disabled>
      </div>

      <!-- Curso -->
      <div class="mb3">
        <label class="form-label">Curso</label>
        <input type="number" name="telefono" class="form-control" value="<?= $alumno->curso?>" disabled>
      </div>

      <!-- Asignaturas -->
      <div class="mb3">
        <label class="form-label">Curso</label>
        <input type="number" name="telefono" class="form-control" value="<?= ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignaturas) ?>" disabled>
      </div>

      <br>
      <div class="mb3" role="group">
        <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
      </div>
    </form>
    <br>
    <br>
    <br>
    <!-- Incluimos Partials footer -->
    <?php include("partials/partial.footer.php") ?>
  </div>

  <!-- Incluimos Partials javascript bootstrap -->
  <?php include("layouts/layout.javascript.php") ?>
</body>

</html>