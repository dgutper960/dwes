<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1>Formulario subida archivos</h1>
        <!-- Formulario subida -->
        <form action="validar.php" method="POST" enctype="multipart/form-data">
            <!-- nombre -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="email" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <!-- observaciones -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <!-- fichero -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Seleccionar Archivo</label>
                <input class="form-control" name="fichero" type="file" id="formFile">
            </div>

            <!-- Botones de accion -->
            <button class="btn btn-primary" type="submiit">Enviar</button>

        </form>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>