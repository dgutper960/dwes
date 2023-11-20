<!-- Crear view.mostrar.php a partir de view.nuevo.php -->
<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos HEAD -->
  <?php include("layouts/layout.head.php") ?>
  <title>Añadir Película - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Incluimos Cabecera -->
    <?php include("partials/partial.cabecera.php") ?>

    <legend>
      Formulario Mostrar Película
    </legend>

    <form>
      <!-- Campo ID Oculto-->
      <div class="mb3">
        <label class="form-label">Id</label>
        <input name="id" type="text" class="form-control" value="<?= $pelicula->getId() ?>">
      </div>

      <!-- Campo título -->
      <div class="mb3">
        <label class="form-label">Título</label>
        <input type="text"  class="form-control" value="<?= $pelicula->getTitulo() ?>">
      </div>

      <!-- País Select -->
      <div class="mb3">
        <label class="form-label">País</label>
        <input type="text" class="form-control" value="<?= $paises[$pelicula->getPais()] ?>">
      </div>

      <!-- Campo director -->
      <div class="mb3">
        <label class="form-label">Director</label>
        <input name="director" type="text" class="form-control" value="<?= $pelicula->getDirector() ?>">
      </div>

      <!-- Campo Año -->
      <div class="mb3">
        <label class="form-label">Año</label>
        <input name="year" type="number" class="form-control" value="<?= $pelicula->getYear() ?>">
      </div>

      <!-- Géneros -->
      <div class="mb3">
        <label class="form-label">Géneros</label>
        <input name="director" type="text" class="form-control" value="<?= ArrayPeliculas::mostrarGeneros($generos, $pelicula->getGeneros()); ?>">
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