<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de vista en Laravel</title>
</head>

<body>

    <h1>Titulo de la vista</h1>
    <!-- Mostramos las variables definidas en el controlador como array -->
    <h3>
        <?= $nombre ?>
    </h3>
    <h3>
        <?= $curso ?>
    </h3>
    <hr>
    <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique odio praesentium rem expedita exercitationem
        voluptatum tenetur modi explicabo, hic in eaque sed quod ipsa, aperiam, deleniti fugit quasi incidunt error.
    </p>
    <!-- mostramos el contenido del array -->
    <table>

        <?php foreach ($asignaturas as $asignatura): ?>
        <tr>
            <td>
                <?= $asignatura?>
            </td>
        </tr>
        <?php endforeach;?>

    </table>


</body>

</html>