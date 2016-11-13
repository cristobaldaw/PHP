<div class="container">
	<div class="col-md-8 offset-md-2">
		<div class="card card-block text-md-center">
			<h1>¡Se ha <?=$accion?> la oferta con éxito!</h1> <?php
			if (isset($_SESSION["url_buscar"])) {
				$ref_volver2 = $_SESSION["url_buscar"] . "&page=1";
			} ?>
			<a href="?<?=$ref_volver2?>" class="btn btn-primary">Volver</a>
		</div>
	</div>
</div>