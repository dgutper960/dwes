
<!-- Vamos a crear un ejemplo del modelo
vista controlador -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo-08 - Tema 2</title>
</head>
<body>
    <center>
        <h2>Ejemplo-08 - Tema 2</h2>
    </center>
<!-- En el body, creamos una tabla -->

    <table border="1">
    <tr>
        <!-- Ejemplo de como NO hacerlo -->
            <th>Usuario</th>
            <th>Especialidad</th>
            <th>Categoía</th>

        </tr>
        <tr>
        <!-- Ejemplo de como NO hacerlo -->
            <td><?php echo $usuario ?></td>
            <td><?php echo $especialidad ?></td>
            <td><?php echo $categoría ?></td>

        </tr>
    </table>

    <br>

    <table border="1">
    <tr>

            <th>Usuario</th>
            <th>Especialidad</th>
            <th>Categoía</th>

        </tr>
        <tr>
        <!-- Ejemplo de como HAY QUE hacerlo -->
            <td><?=$usuario ?></td>
            <td><?=$especialidad ?></td>
            <td><?=$categoría ?></td>

        </tr>
    </table>



</body>
</html>