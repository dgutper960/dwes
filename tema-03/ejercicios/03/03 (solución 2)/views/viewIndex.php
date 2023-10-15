<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html'; ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-building-fill-up"></i>
            <span class="fs-6">Act 3.3 # Formulario días semana</span>
        </header>

        <legend>Días en esta semana</legend>

        <form>
            <?php include 'models/modelDia.php' ?>


            <!-- Fuera del bucle -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>


        <br>
        <br>
        <br>

        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>