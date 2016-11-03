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
		<div class="jumbotron jumbotron text-md-center" id="grad1">
			<h1 class="display-3">JobYesterday</h1>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="my-2">
			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
			<p class="lead">
				<form method="post" action="../controllers/ctr_anadir.php">
					<button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir nueva oferta</button>
				</form>
			</p>
		</div>
		<form method="post" action="../controllers/ctr_buscar.php" id="form_buscar">
			<div class="col-md-3">
				<?= CreaSelect("campo", $campos) ?>
			</div>
			<div class="col-md-5">
				<div class="input-group">
					<input type="text" class="form-control" name="busqueda" placeholder="Buscar">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary" name="buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						</span>
				</div>
			</div>
		</form>
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
				if (empty($lista)) { ?>
					<tr>
						<td colspan="7">No hay ofertas para mostrar</td>
					</tr> <?php
				} else {
					foreach ($lista as $elemento) { ?>
						<tr>
							<td><?=$elemento["fecha_creacion"]?></td>
							<td><?=$elemento["descripcion"]?></td>
							<td><?=$elemento["persona_contacto"]?></td>
							<td><?=$elemento["telefono_contacto"]?></td>
							<td><?=$elemento["email"]?></td>
							<td><?=NombreProvincia($elemento["provincia"])?></td>
							<td>
								<ul class="list-inline">
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_informacion.php">
											<button type="submit" name="informacion" class="btn btn-sm btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$elemento['id']?>"> <!-- Guardo en un campo oculto el id de cada oferta para mandarlo a la vista -->
										</form>
									</li>
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_modificar.php">
											<button type="submit" name="modificar" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$elemento['id']?>">
										</form>
									</li>
									<li class="list-inline-item">
										<form method="post" action="../controllers/ctr_eliminar.php">
											<button type="submit" name="eliminar" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
											<input type="hidden" name="id" value="<?=$elemento['id']?>">
										</form>
									</li>
								</ul>
							</td>
						</tr> <?php
					}
				} ?>
			</tbody>
		</table>
		<?= Paginacion($total_ofertas, $tamano_pagina, $total_paginas, $pagina, "ctr_admin"); ?>
	</div>

</body>
</html>