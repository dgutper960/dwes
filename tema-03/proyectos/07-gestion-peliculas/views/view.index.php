<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos layout.head.php -->
  <?php include 'views/layouts/layout.head.php' ?>

  <title>Home - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Cabecera -->
    <!-- Incluimos partial.cabecera.php -->
    <?php include 'views/partials/partial.cabecera.php' ?>

    <legend>
      Tabla Películas
    </legend>

    <!-- Incluimos Partials menu -->
    <!-- Incluimos partial.menu.php -->
    <?php include 'views/partials/partial.menu.php' ?>

    <!-- Generamos la tabla de libros -->
    <table class="table">
      <!-- Generamos el encabezado de la tabla películas -->
      <thead>
        <tr>

        </tr>
      </thead>
      <tbody>
        <!-- Mostramos los detalles de las películas -->
        <tr>
          <?php foreach (array_keys($peliculas[0]) as $key): ?> <!-- Iteramos solo sobre un índice -->
            <!-- usamos la funcion array_keys() busca claves en un array -->
            <th>
              <?= ucfirst($key); ?>
            </th> <!-- usamos la funcion ucfirst() Pone la primera latra en mayúscula -->
          <?php endforeach; ?>
        </tr>
        <!-- Muestro los datos de la película -->
        <?php foreach ($peliculas as $pelicula): ?>
          <tr>
            <td>
              <?= $pelicula['id'] ?>
            </td>
            <td>
              <?= $pelicula['titulo'] ?>
            </td>
            <td>
              <?= $paises[$pelicula['pais']] ?>
            </td>
            <td>
              <?= $pelicula['director'] ?>
            </td>
            <!-- Crear funcion para mostrar generos -->
            <td>
              <?= mostrarGeneros($generos, $pelicula['generos']); ?> <!--$pelicula['generos'] retorna un array -->
            </td>
            <td>
              <?= $pelicula['año'] ?>
            </td>


            <!-- Muestro los botones de acción -->
            <td>
              <a href="#" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
              <a href="#" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
              <a href="mostrar.php?=<?= $pelicula['id'] ?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
            </td>
            <!-- Fin botones de acción -->
          </tr>
        <?php endforeach; ?>

      <tfoot>
        <tr>
          <td colspan="7">Número Registros:
            <?= count($peliculas) ?>
          </td>
        </tr>
      </tfoot>

      </tbody>
    </table>

    <!-- Incluimos Partials footer -->
    <!-- Incluimos partial.footer.php -->
    <?php include 'views/partials/partial.footer.php' ?>

  </div>

  <!-- Incluimos Partials javascript bootstrap -->
  <!-- Incluimos layout.javascript.php -->
  <?php include 'views/layouts/layout.javascript.php' ?>

</body>

</html>