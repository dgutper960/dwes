<!doctype html>
<html lang="es">
  <head>
      <?php include 'views/plantilla/head.html' ?>
      <title>Plantilla Bootstrap 5.3.2</title>
  </head>
  <body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- HEADER = Información para el SEO -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>        
            <span class="fs-6">Proyecto 2.1 - Lanzamiento Proyectiles</span>
        </header>

        <legend>Resultado</legend>
        <form method="POST">

          <!-- valor-1 por el usuario -->
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>Valores Iniciales</th>
                <th></th>
              </tr>
              <tr>
                <td>Velocidad inicial:</td>
                <td><?=$v0?> m/s</td>
              </tr>
              <td>Ángulo Inclinación</td>
                <td><?=$angulo?> º</td>
              </tr>
              <tr>
                <th>Resultados</th>
                <th></th>
              </tr>
              <td>Angulos Radianes:</td>
                <td><?=$a0?> º</td>
              </tr>
              <tr>
                <td>Velocidad Inicial X:</td>
                <td><?=$vx?> m/s</td>
              </tr>
              <tr>
                <td>Velocidad Inicial Y:</td>
                <td><?=$vy?> m/s</td>
              </tr>
              <tr>
                <td>Alcance Máximo del Proyectil:</td>
                <td><?=$xmax?> m</td>
              </tr>
              <tr>
                <td>Tiempo de Vuelo del Proyectil:</td>
                <td><?=$t?> m</td>
              </tr>
              <tr>
                <td>Altura Máxima del Proyectil:</td>
                <td><?=$ymax?> m</td>
              </tr>

            </thead>
            <tbody>

            </tbody>
          </table>

          <!-- botones de accion -->
          <div class="btn-group" role="group">

            <a class="btn btn-primary" href="index.php" role="button">Volver</a>

          </div>

    </div>

    
    <!-- Pie del documento -->
    <?php include 'views/plantilla/footer.html' ?>

    <!-- Bootstrap Javascript y popper -->
    <?php include 'views/plantilla/javascript.html' ?>
  </body>
</html>