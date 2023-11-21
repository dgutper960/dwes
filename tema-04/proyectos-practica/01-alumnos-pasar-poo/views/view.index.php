<!doctype html>
<html lang="es">
  <head>
    <!-- Incluimos layout.head.php -->
    <?php include("views/layouts/layout.head.php");  ?>
    
    <title>Home - CRUD Tabla Alumnos</title>
  </head>
  
  <body>
    <div class="container">
      
      <!-- Cabecera -->
      <!-- Incluimos partial.cabecera.php -->
      <?php include("vews/partials.cabecera.php"); ?>
  
      <legend>
        Tabla alumnos
      </legend>

      <!-- Incluimos Partials menu -->
      <!-- Incluimos partial.menu.php -->

      <!-- Generamos la tabla de libros -->
      <table class="table">
        <!-- Generamos el encabezado de la tabla alumnos -->
        <thead>
          <tr>
           <th>id</th>
           <th>Nombre</th>
           <th>Apellidos</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Curso</th>
           <th>Asignaturas</th>
           <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Mostramos los detalles de los alumnos -->
          <?php foreach ($alumnos as $alumno): ?>
            <!-- Muestro los datos de la película -->
            <tr>
              <td><?=$alumno->id?></td>
              <td><?=$alumno->nombre?></td>
              <td><?=$alumno->apellidos?></td>
              <td><?=$alumno->email?></td>
              <td><?=$alumno->telefono?></td>
              <td><?=$cursos[$alumno->curso]?></td>
              <td><?= ArrayAlumnos::mostarAsignaturas($asignaturas, $alumno->asigmaturas) ?></td>


          
            
              <!-- Muestro los botones de acción -->
              <td>
                <a href="#" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                <a href="#" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
                <a href="#" Title="Mostrar"><i class="bi bi-eye"></i></a>
              </td>
            <!-- Fin botones de acción -->
            
            </tr>
          <?php endforeach; ?>
          <tfoot>
            <tr>
              <td colspan="7">Número Registros: <?= ?></td>
            </tr>
          </tfoot>
          
        </tbody>
      </table>
      
      <!-- Incluimos Partials footer -->
      <!-- Incluimos partial.footer.php -->
      <?php include("vews/partials.footer.php"); ?>
      
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <!-- Incluimos layout.javascript.php -->
    <?php include("views/layouts/javascript.php");  ?>

  </body>
</html>