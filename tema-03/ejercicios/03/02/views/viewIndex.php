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
            <span class="fs-6">Act 3.2 #2 Mostrar tabla de multiplicar</span>
        </header>

        <legend></legend>
        <!-- craemos una tabla -->
        <table class="table table-success table-striped">
            <?php
            $resultado; 
            for($i =1; $i<=10; $i++):?>
                <tr><th>Tabla del <?=$i?></th></tr>
                <tr>
                <?php for($j=1; $j<=10; $j++): 
                    $resultado = $i * $j ?>
                    <td><?=$i?> x <?=$j?> = <?=$resultado?></td>
                <?php endfor; ?>
                </tr>
            <?php endfor ?>

        </table>

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