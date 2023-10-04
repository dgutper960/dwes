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
            <i class="bi bi-send-check-fill"></i>        
            <span class="fs-6">Proyecto 2.2 - Lanzamiento de Proyectiles</span>
            <i class="bi bi-send-check-fill"></i>
        </header>

        <legend>Lanzamiento de Proyectiles</legend>
        <form method="POST">

          <!-- valor-1 por el usuario -->
          <div class="mb-3">
            <label class="form-label">Velocidad Inicial</label>
            <input type="number" name="v0" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="">
            <small id="helpId" class="text-muted">Introduzca la velocidad en m/s</small> <!--para comentar en la casilla de usuario-->
          </div>

          <!-- valor-2 por el usuario -->
          <div class="mb-3">
            <label class="form-label">Ángulo de Lanzamiento</label>
            <input type="number" name="a0" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="">
            <small id="helpId" class="text-muted">Introduzca los ángulos en grados</small> <!--para comentar en la casilla de usuario-->
          </div>

          <!-- botones de accion -->
          <div>
            <button type="reset" class="btn btn-secondary">Borrar</button>
            <button type="submit" class="btn btn-primary" formaction="calcular.php">Calcular</button>
          </div>

    </div>

    
    <!-- Pie del documento -->
    <?php include 'views/plantilla/footer.html' ?>

     <!-- Bootstrap Javascript y popper -->
    <?php include 'views/plantilla/javascript.html' ?>
  </body>
</html>