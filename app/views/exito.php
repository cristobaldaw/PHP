<?php $volver = (isset($_SESSION["url_buscar"])) ? $_SESSION["url_buscar"] . "&page=1" : "?ctrl=ctrl_inicio"; ?>
<div class="container">
	<div class="col-md-8 offset-md-2">
		<div class="card card-block text-md-center">
			<h1>¡Se ha <?=$accion?> la oferta con éxito!</h1>
			<a href="<?=$volver?>" class="btn btn-primary">Volver</a>
		</div>
	</div>
</div>