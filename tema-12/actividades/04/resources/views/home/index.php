<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Hola Mundo en la vista Home</h1>

</body>

<footer>
    <p>Autor:
        <?= $autor ?>
        <!-- {{$autor}} Da error ya que este vista no es blade, en la otra vista (hola.ejemplo.blade.php) funcionaría --> 
    </p>
</footer>

</html>