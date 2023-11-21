<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("layouts/layout.head.php"); ?>
    <title>Nuevo - Gestión Jugadores </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Formulario Mostrar Jugador</legend>

        <form>
            <!-- id -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?=$jugadorMostrar->getId()?>">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$jugadorMostrar->getNombre()?>">
            </div>
            <!-- número -->
            <div class="mb-3">
                <label for="" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" value="<?=$jugadorMostrar->getNumero()?>">
            </div>
            <!-- contrato -->
            <div class="mb-3">
                <label for="" class="form-label">Contrato</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" value="<?=$jugadorMostrar->getContrato()?>">
            </div>

            <!-- Pais -->
            <div class="mb-3">
                <label for="" class="form-label">País</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" value="<?=$paises[$jugadorMostrar->getContrato()]?>">
            </div>
            <!-- equipos -->
            <div class="mb-3">
                <label for="" class="form-label">Equipo</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" value="<?=$equipos[$jugadorMostrar->getEquipo()]?>">
            </div>


            <!-- Perfiles List Checkbox -->
            <div class="mb-3">
                <label for="" class="form-label">Equipo</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" value="<?= TablaJugadores::listaPosiciones($jugador->getPosiciones(), $posiciones) ?>">
            </div>

            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>

        </form>

        <br><br><br> <br>

        <!-- Pie del documento -->
        <?php include("partials/partial.footer.php"); ?>

        <!-- Bootstrap Javascript y popper -->
        <?php include("layouts/layout.javascript.php"); ?>

</body>

</html>