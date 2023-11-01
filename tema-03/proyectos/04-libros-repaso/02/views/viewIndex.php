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

            <span class="fs-6">Librería</span>   
        </header>

        <legend>Gestión de libros</legend>
        <table class="table table-success table-striped">
        <!-- encabezado tabla -->
            <thead>
                <tr>
                    <!-- Uso de foreach para encabezado -->
                    <!-- <//?php foreach(array_keys($libros[0]) as $clave): ?>
                        <th><//?=$clave?></th>
                    <//?php endforeach; ?> -->
                    
                    <!-- personalizado -->
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Precio</th>
                </tr>

            </thead>
            <!-- llamada al método borrar -->
            <?php ?>

            <tbody>
                <?php foreach($libros as $libro): ?>
                    <tr>
                        <!-- Mismo formato a cad campo de lo tabla -->
                        <?php  foreach($libro as $campo): ?>
                            <td><?=$campo?></td>
                        <?php endforeach ?>

                        <!-- Con formato para cada campo -->
                        <!-- <td><//?= $libro['id']?></td>
                        <td><//?= $libro['titulo']?></td> -->

                    </tr>
                    <?php endforeach; ?>
            </tbody>
            <!-- Para mostrar el pié de una tabla -->
            <tfoot>
                <tr colspan="5" >Nº de libros <?= count($libros)?></tr>
            </tfoot>

        </table>

        
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
        
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>