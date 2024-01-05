<!doctype html>
<html lang="es"> 

<?php require_once("template/partials/head.php") ?>

<body>   
    <!-- Page Content -->
    <div class="container">
	<br><br><br><br>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				<h3>ERROR 404</h3>
			</div>
			<div class="card-body">
				
                <p class="lead"><?php echo $this->mensaje ?></p>

			</div>
		</div>
    </div>
    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>