<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos HEAD -->
  <?php include("layouts/layout.head.php") ?>
  <title>Añadir Película - CRUD Tabla Alumnos</title>
</head>

<body>
  <div class="container">

    <!-- Incluimos Cabecera -->
    <?php include("partials/partial.cabecera.php") ?>

    <legend>
      Formulario Nueva Película
    </legend>

    <form action="create.php" method="POST">
      <!-- Campo ID Oculto-->
      <div class="mb3" hidden>
        <label class="form-label">Id</label>
        <input name="id" type="text" class="form-control">
      </div>

      <!-- Campo Nombre -->
      <div class="mb3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>


      <!-- Campo Apellidos -->
      <div class="mb3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required>
      </div>

      <!-- Campo Email -->
      <div class="mb3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <!-- Campo Apellidos -->
      <div class="mb3">
        <label class="form-label">Telefono</label>
        <input type="number" name="telefono" class="form-control" required>
      </div>

      <!-- País Curso -->
      <div class="mb-3">
        <label for="pais" class="form-label">Curso</label>
        <select class="form-select" aria-label="Default select example" name="curso">
          <option selected disabled>Seleccione Curso</option>
          <!-- Generar dinámicamente select  -->
          <?php foreach ($cursos as $key => $value): ?>
            <option value="<?= $key ?>">
              <?= $value ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Categorías -->
      <div class="mb-3">
        <label class="form-label">Géneros</label>
        <div class="form-control">
          <!-- Generar dinámicamente lista checkbox de géneros -->
          <?php foreach ($asignaturas as $key => $value): ?>
            <div class="form-check">
              <input class="form-check-input" name="asignaturas[]" type="checkbox" value="<?=$key?>" id="flexCheckChecked">
              <label class="form-check-label" for="flexCheckChecked">
                <?=$value?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <br>
      <div class="mb3" role="group">
        <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
        <button type="reset" class="btn btn-danger">Borrar</button>
        <button type="submit" class="btn btn-primary">Añadir</button>
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