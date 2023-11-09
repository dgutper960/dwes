<!-- Crear view.mostrar.php a partir de view.nuevo.php -->
<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos HEAD -->
  <?php include("layouts/layout.head.php") ?>
  <title>Mostrar Película - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Incluimos Cabecera -->
    <?php include("partials/partial.cabecera.php") ?>

    <legend>
      Formulario Nueva Película
    </legend>

    <form action="create.php" method="POST"> <!-- envia datos al controlador create.php método POST -->
      <!-- Campo ID Oculto-->
      <div class="mb3" hidden>
        <label class="form-label">Id</label>
        <input name="id" type="text" class="form-control" value="<?= $pelicula['id'] ?>" disabled>
      </div>

      <!-- Campo título -->
      <div class="mb3">
        <label class="form-label">Título</label>
        <input name="titulo" type="text" class="form-control" value="<?= $pelicula['titulo'] ?>" disabled>
      </div>

      <!-- País Select -->
      <div class="mb-3">
        <label for="pais" class="form-label">País</label>
        <select class="form-select" aria-label="Default select example" name="pais" disabled>
          <option selected disabled>Seleccione País</option>
          <!-- Generar dinámicamente select  -->
          <?php foreach ($paises as $key => $value): ?> <!-- recorremos el array de paises para generar options dinamicas -->
            <option value="<?= $key ?>"> <!-- El valor capturado va a corresponder con el indice del pais correspondiente -->
              <?= $value ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Campo director -->
      <div class="mb3">
        <label class="form-label">Director</label>
        <input name="director" type="text" class="form-control" value="<?= $pelicula['titulo'] ?>" disabled>
      </div>

      <!-- Campo Año -->
      <div class="mb3">
        <label class="form-label">Año</label>
        <input name="año" type="number" class="form-control" value="<?= $pelicula['año'] ?>" disabled>
      </div>

      <!-- Categorías -->
      <div class="mb-3">
        <label class="form-label">Géneros</label>
        <div class="form-control">
          <!-- Generar dinámicamente lista checkbox de géneros -->
          <?php foreach($generos as $key => $value):?> <!-- recorremos el array de categorías -->
            <div class="form-chek"> <!-- Almacenamos un array con los valores seleccionados -->
              <input type="checkbox" value="<?= $key ?>" name="generos[]"  disabled>
              <label class="form-check-label" for="">
                <?= $value ?> <!-- Valor de la casilla a seleccionar -->
              </label>
            </div>
            <?php endforeach; ?>
        </div>
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