<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir head -->
    <?php include 'views/layouts/head.html';?>
</head>
<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Calculadora Conversor Decimal</span>  
        </header>

        <legend>Resultados</legend>

        <!-- tabla resultado -->
            <table class="table">
            <tr>
                <th scope="col">DECIMAL</th>
                <th scope="col"><?=$valor?></th>
            </tr>
            <tr>
                <th scope="col"><?=$nameBinario?></th>
                <td scope="col"><?=$binario?></td>
            </tr>
            <tr>
                <th scope="col"><?=$nameOctal?></th>
                <td scope="col"><?=$octal?></td>
            </tr>
            <tr>
                <th scope="col"><?=$nameHexad?></th>
                <td scope="col"><?=$hexadecimal?></td>
            </tr>
            </table>        

            <br>
            
            <!-- Botones de acción -->

            <a class="btn btn-primary" href="index.php" role="button">Volver</a>

            
        </form>

        
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
        
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>