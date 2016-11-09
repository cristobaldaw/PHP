<div class="container">
	<div class="jumbotron jumbotron-azul">
		<div class="text-md-left">
			<a href="?ctrl=<?=$ref_volver?>" class="btn btn-primary btn_volver" title="Volver"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
		</div>
		<div class="text-md-center">
			<?php
			if (isset($resultados) && empty($resultados)) { ?>
				<div class="alert alert-danger col-md-6 offset-md-3">
					<ul>Introduzca al menos un campo para buscar</ul>
				</div> <?php
			} ?>
			<h1 class="display-3">Búsqueda</h1><br>
			<form method="get">
				<input type="hidden" name="ctrl" value="ctrl_buscar">
				<div class="row">
					<div class="col-md-4"><h3>Descripción:</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio1", $campos, ValorGet('criterio1')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="<?=ValorGet('descripcion')?>">
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><h3>Fecha de creación:</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio2", $campos, ValorGet('criterio2')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="fecha_creacion" placeholder="Fecha de creación (dd/mm/aaaa)" value="<?=ValorGet('fecha_creacion')?>">
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><h3>Persona de contacto</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio3", $campos, ValorGet('criterio3')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="persona_contacto" placeholder="Persona de contacto" value="<?=ValorGet('persona_contacto')?>">
						</div>
					</div>
				</div>
				<div class="row">
					<br><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</form>
		</div>
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
						<td><?=$resultado["fecha"]?></td>
						<td><?=$resultado["descripcion"]?></td>
						<td><?=$resultado["persona_contacto"]?></td>
						<td><?=$resultado["telefono_contacto"]?></td>
						<td><?=$resultado["email"]?></td>
						<td><?=NombreProvincia($resultado["provincia"])?></td>
						<td class="opciones">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a href="?ctrl=ctrl_informacion&id=<?=$resultado['id']?>" class="btn btn-sm btn-info" title="Información"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="?ctrl=ctrl_mod_admin&id=<?=$resultado['id']?>" class="btn btn-sm btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								</li>
								<li class="list-inline-item">
									<a href="?ctrl=ctrl_eliminar&id=<?=$resultado['id']?>" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</li>
							</ul>
						</td>
					</tr> <?php
				}
			} ?>
		</tbody>
	</table> <?php
	if (!empty($resultados)) {
		PaginacionBusqueda($total_resultados, $tamano_pagina, $total_paginas, $pagina, "ctrl_buscar", $_GET);
	} ?>
</div>