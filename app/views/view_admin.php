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
		<div class="jumbotron text-md-center" id="grad1">
			<h1 class="display-3">JobYesterday</h1>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="my-2">
			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
			<p class="lead">
				<a href="../controllers/ctr_anadir.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir nueva oferta</button></a>
			</p>
		</div>
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
		</table> <?php
		if ($total_ofertas > $tamano_pagina) { // Si el total de ofertas es menor que el tamaño de la página, no hay paginación ?>
			<div class="text-md-center">
				<ul class="pagination"><?php
					if ($pagina == 1) { // Si estoy en la primera página, no me deja retroceder más ?>
						<li><a href="">&lt;&lt;</a></li>
						<li><a href="">&lt;</a></li> <?php
					} else { ?>
						<li><a href="ctr_admin.php?pagina=1">&lt;&lt;</a></li>
						<li><a href="ctr_admin.php?pagina=<?=($pagina-1)?>">&lt;</a></li> <?php
					}
					if ($total_paginas > 1) {
						for ($i = 1 ; $i <= $total_paginas; $i++) {
							if ($pagina == $i) { ?>
								<li><a class="active" href=""><?=$pagina?></a></li>	<?php
							} else { ?>
								<li><a href="ctr_admin.php?pagina=<?=$i?>"><?=$i?></a></li> <?php 
							}
						}
					}
					if ($total_paginas == $pagina) { // Si estoy en la última página, no me deja avanzar más ?>
						<li><a href="">&gt;</a></li>
						<li><a href="">&gt;&gt;</a></li> <?php
					} else { ?>
						<li><a href="ctr_admin.php?pagina=<?=($pagina+1)?>">&gt;</a></li>
						<li><a href="ctr_admin.php?pagina=<?=$total_paginas?>">&gt;&gt;</a></li> <?php
					} ?>
				</ul>
			</div> <?php
		} ?>
	</div>

</body>
</html>