<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../assets/js/jquery.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron jumbotron-fluid text-md-center">
			<h1 class="display-3">Búsqueda</h1><br>
		</div>
		<caption>Resultados: <?=$total_resultados?></caption>
		<table class="table table-bordered table-hover">
			<thead class="table-inverse">
				<tr>
					<th>Fecha de creación</th>
					<th>Descripción</th>
					<th>Persona de contacto</th>
					<th>Teléfono de contacto</th>
					<th>Correo electrónico</th>
					<th>Provincia</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody> <?php
				if (empty($resultados)) { ?>
					<tr>
						<td colspan="7">No hay ofertas para mostrar</td>
					</tr> <?php
				} else {
					foreach ($resultados as $resultado) { ?>
						<tr>
							<td><?=$resultado["fecha_creacion"]?></td>
							<td><?=$resultado["descripcion"]?></td>
							<td><?=$resultado["persona_contacto"]?></td>
							<td><?=$resultado["telefono_contacto"]?></td>
							<td><?=$resultado["email"]?></td>
							<td><?=NombreProvincia($resultado["provincia"])?></td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_informacion.php">
											<button type="submit" name="informacion" class="btn btn-sm btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$resultado['id']?>"> <!-- Guardo en un campo oculto el id de cada oferta para mandarlo a la vista -->
										</form>
									</li>
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_modificar.php">
											<button type="submit" name="modificar" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$resultado['id']?>">
										</form>
									</li>
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_eliminar.php">
											<button type="submit" name="eliminar" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$resultado['id']?>">
										</form>
									</li>
								</ul>
							</td>
						</tr> <?php
					}
				} ?>
			</tbody>
		</table>
		<?= Paginacion($total_resultados, $tamano_pagina, $total_paginas, $pagina, "ctr_buscar") ?>
	</div>
</body>
</html>