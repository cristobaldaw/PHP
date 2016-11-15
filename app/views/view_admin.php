<div class="container">
	<div class="jumbotron jumbotron text-md-center jumbotron-gray">
		<h1 class="display-3">Panel de administrador</h1>
		<hr>
		<a href="?ctrl=ctrl_anadir" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir nueva oferta</a>
		<a href="?ctrl=ctrl_buscar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
		<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary"><i class="fa fa-user" aria-hidden="true"></i> Gestión de usuarios</a>
	</div>
	<div class="col-md-8" id="opciones_ofertas">
		<form method="post">
			<label for="orderby">Ordenar por:</label>
			<?=CreaSelect("orderby", $orderby, $_SESSION["orderby"])?>
			<?=CreaSelect("orden", $orden, $_SESSION["orden"])?>
			<button type="submit" class="btn btn-primary">Ordenar</button>
		</form>
	</div>
	<div class="col-md-4 text-md-right">
		<form method="post">
			<label for="tamano_pagina">Nº de ofertas por página:</label>
			<?=CreaSelect("tamano_pagina", $tamano_pagina, $_SESSION["tamano_pagina"])?>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
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
				foreach ($lista as $oferta) { ?>
					<tr>
						<td><?=$oferta["fecha_creacion"]?></td>
						<td><?=$oferta["descripcion"]?></td>
						<td><?=$oferta["persona_contacto"]?></td>
						<td><?=$oferta["telefono_contacto"]?></td>
						<td><?=$oferta["email"]?></td>
						<td><?=NombreProvincia($oferta["provincia"])?></td>
						<td class="opciones">
							<a href="?ctrl=ctrl_informacion&id=<?=$oferta['id']?>" class="btn btn-sm btn-info" title="Información"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
							<a href="?ctrl=ctrl_mod_admin&id=<?=$oferta['id']?>" class="btn btn-sm btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a href="?ctrl=ctrl_eliminar&id=<?=$oferta['id']?>" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr> <?php
				}
			} ?>
		</tbody>
	</table>
	<?= Paginacion($total_ofertas, $_SESSION["tamano_pagina"], $total_paginas, $_SESSION["page"], "ctrl_admin"); ?>
</div>