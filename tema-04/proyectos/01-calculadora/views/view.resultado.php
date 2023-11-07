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
        <legend>Resultado de <?= $operacion ?> <?= $valor1 ?> y <?= $valor2 ?>  </legend>

        <!-- Formulario Nuevo Artículo -->
        <form action="calcular.php" method="POST">
            <!-- valor 1 -->
            <div class="mb-3">
                <label class="form-label">Valor 1</label>
                <input type="number" class="form-control" value="<?= $calcular->getValor1() ?>" disabled disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- valor 2 -->
            <div class="mb-3">
                <label class="form-label">Valor 2</label>
                <input type="number" class="form-control" value="<?= $calcular->getValor2() ?>" disabled disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>

            <!-- resultado -->
            <div class="mb-3">
                <label class="form-label">Resultado</label>
                <input type="number" class="form-control" value="<?= $calcular->getResultado() ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>

            <!-- Botones de acción -->
            <a href="index.php" class="btn btn-danger">Volver</a>
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