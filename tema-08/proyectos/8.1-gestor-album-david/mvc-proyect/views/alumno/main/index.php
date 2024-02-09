<!doctype html>
<html lang="es">

<!-- head -->

<head>
	<?php require_once("template/partials/head.php") ?>
	<title>
		<?= $this->title ?>
	</title>

	<head>


	<body>
		<!-- Menú Principal -->
		<?php require_once("template/partials/menuAut.php") ?>
		<br><br><br>

		<!-- Page Content -->
		<div class="container">
			<!-- cabecera  -->
			<?php require_once("views/album/partials/header.php") ?>

			<!-- mensajes -->
			<?php require_once("template/partials/notify.php") ?>

			<!-- errores -->
			<?php require_once("template/partials/error.php") ?>



			<!-- Estilo card de bootstrap -->
			<div class="card">
				<div class="card-header">
					Tabla de albums
				</div>
				<div class="card-header">
					<!-- menu albums -->
					<?php require_once("views/album/partials/menu.php") ?>
				</div>
				<div class="card-body">

					<!-- Muestra datos de la tabla -->
					<table class="table">
						<!-- Encabezado tabla -->
						<thead>
							<tr>
								<!-- personalizado -->
								<th>Id</th>
								<th>Titulo</th>
								<th>Lugar</th>
								<th>Categoría</th>
								<th>Etiquetas</th>
								<th>Num Fotos</th>
								<th>Num Visitas</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<!-- Mostramos cuerpo de la tabla -->
						<tbody>

							<!-- Objeto clase pdostatement en foreach -->
							<?php foreach ($this->albumes as $album): ?>
								<tr>
									<!-- Formatos distintos para cada  columna -->

									<!-- Detalles de albums -->
									<td><?= $album->id ?></td>
									<td><?= $album->titulo ?></td>
									<td><?= $album->edad ?></td>
									<td><?= $album->dni ?></td>
									<td><?= $album->poblacion ?></td>
									<td><?= $album->email ?></td>
									<td><?= $album->telefono ?></td>
									<td><?= $album->curso ?></td>

									<!-- botones de acción -->
									<td>
										<!-- botón  eliminar -->
										<a href="<?= URL ?>album/delete/<?= $album->id ?>" title="Eliminar"
											onclick="return confirm('Confimar elimación del album')" Class="btn btn-danger
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete'])) ?
												'disabled' : null ?>">
											<i class="bi bi-trash"></i>
										</a>

										<!-- botón  editar -->
										<a href="<?= URL ?>album/edit/<?= $album->id ?>" title="Editar" class="btn btn-primary
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))?
												'disabled' : null ?>">
											<i class="bi bi-pencil"></i>
										</a>

										<!-- botón  mostrar -->
										<a href="<?= URL ?>album/show/<?= $album->id ?> ?>" title="Mostrar" class="btn btn-warning
											<?= (!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])) ?
												'disabled' : null ?>">
											<i class="bi bi-card-text"></i>
										</a>

									</td>
								</tr>

							<?php endforeach; ?>


						</tbody>

					</table>

				</div>
				<div class="card-footer">
					<small class="text-muted"> Nº albums:
						<?= $this->albums->rowCount(); ?>
					</small>
				</div>
			</div>
		</div>
		<br><br><br>

		<!-- /.container -->

		<?php require_once("template/partials/footer.php") ?>
		<?php require_once("template/partials/javascript.php") ?>

	</body>

</html>