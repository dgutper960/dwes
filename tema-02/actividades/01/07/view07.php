<!DOCTYPE html>
<html lang="es">
<head>
    <!-- en este HTML vamos a crear el cuadro -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla ejercicio 7</title>
</head>
<body>
    <h1>Datos del Alumno</h1>
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

    <p>El alunno <?=$Nombre;?> <?=$Apellidos?> natural de la villa de <?=$Poblacion?>,
    <br>
    está cursando el <?=$Curso?>º Curso del CFGS <?=$Ciclo?>,
    <br>
    cullo módulo de más horas es el de <?=$Modulo?>
    <br>
    y todo esto lo está haciendo a la edad de <?=$Edad?> años.</p>
    <p>"Estoy deseando incorporame a este mercado laboral."</p>
    <p>Afirmó el citado <?=$Nombre?> <?=$Apellidos?>.</p>
    
</body>
</html>