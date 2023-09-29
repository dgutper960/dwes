<!DOCTYPE html>
<html lang="es">
<head>
    <!-- en este HTML vamos a crear el cuadro -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>Nombre</th>
            <td><?= $Nombre;?></td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td><?= $Apellidos;?></td>
        </tr>
        <tr>
            <th>Población</th>
            <td><?= $Poblacion;?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?= $Edad;?></td>
        </tr>
        <tr>
            <th>Ciclo</th>
            <td><?= $Ciclo;?></td>
        </tr>
        <tr>
            <th>Curso</th>
            <td><?= $Curso;?></td>
        </tr>
        <tr>
            <th>Módulo</th>
            <td><?= $Modulo;?></td>
        </tr>
    </table>
    
</body>
</html>