<div class="container">
	<div class="jumbotron jumbotron text-md-center jumbotron-gray">
		<h1 class="display-3">Panel de psicólogo</h1>
		<hr>
		<a href="?ctrl=ctrl_buscar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
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
					<a href="?ctrl=ctrl_mod_psico&id=<?=$oferta['id']?>" class="btn btn-sm btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</td>
			</tr> <?php
		}
	} ?>
</tbody>
</table>
<?= Paginacion($total_ofertas, $tamano_pagina, $total_paginas, $page, "ctrl_psico"); ?>
</div>