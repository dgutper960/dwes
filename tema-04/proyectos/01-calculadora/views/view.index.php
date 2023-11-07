<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'views/partials/header.html' ?>
        <legend>Introduzca los valores y seleccione operación a realizar</legend>

        <!-- Formulario Nuevo Artículo -->
        <form action="calcular.php" method="POST">
            <!-- valor 1 -->
            <div class="mb-3">
                <label class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" step="0.01" placeholder="0">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- valor 2 -->
            <div class="mb-3">
                <label class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" step="0.01" placeholder="0">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>

            <!-- resultado
            <div class="mb-3">
                <label class="form-label">Resultado</label>
                <input type="number" class="form-control" name="resultado" step="0.01" placeholder="0" disabled>

            </div> -->

            <!-- Botones de acción -->
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="sumar">Sumar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="restar">Restar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="multiplicar">Multiplicar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="dividir">Dividir</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="potencia">Potencia</button>
    </div>

    </form>
    <br>
    <br>
    <br>


    </div>

    <!-- Pie de documento -->
    <?php include 'views/partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>