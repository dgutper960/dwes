<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("layouts/layout.head.php");?>
    <title>Gestión Jugadores - Home </title>
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- Encabezado proyecto -->
        <?php include("partials/partial.header.php"); ?>

                
        <!-- Menú principal -->
        <?php include("partials/partial.menu.php");?>
       
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Mostramos el encabezado de la tabla -->
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Número</th>
                        <th>País</th>
                        <th>Equipo</th>
                        <th>Posiciones</th>
                        <th>Contrato</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mostramos cuerpo de la tabla -->
                    <?php foreach ($jugadores as $indice => $jugador): ?>
                        <tr>
                            <!-- Detalles de artículos -->
                            <td><?= $jugador->getId(); ?></td>
                            <td><?= $jugador->getNombre() ?></td>
                            <td><?= $jugador->getNumero() ?></td>
                            <td><?= $paises[$jugador->getPais()] ?></td>
                            <td><?= $equipos[$jugador->getEquipo()] ?></td>
                            <td><?= TablaJugadores::listaPosiciones($jugador->getPosiciones(), $posiciones) ?></td>
                            <td><?= number_format($jugador->getContrato(), 2, ',', '.')?> € </td>
                            
                            <!-- Columna de acciones -->
                            <td>
                                <a href="eliminar.php?key=<?=$indice?>" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                                <a href="editar.php?key=<?=$indice?>" title="Editar"><i class="bi bi-pencil-fill"></i></a>
                                <a href="mostrar.php?key=<?=$indice?>" title="Mostrar"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>   
                </tbody>
                <tfoot>
                    <tr><td colspan="8">Nº Registros <?= count($jugadores)?> </td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br><br><br>

    <!-- Pie del documento -->
    <?php include("partials/partial.footer.php");?>

    <!-- Bootstrap Javascript y popper -->
    <?php include("layouts/layout.javascript.php");?>
    
 
</body>
</html>