<div class="container">
	<div class="jumbotron jumbotron text-md-center jumbotron-azul">
		<h1 class="display-3">Panel de psicólogo</h1>
		<hr class="my-2">
		<p class="lead">
		<a href="?ctrl=ctrl_buscar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
		</p>
	</div>
	<table class="table table-bordered table-hover">
		<thead class="table-inverse">
			<tr>
				<th class="text-md-center">Fecha de creación</th>
				<th class="text-md-center">Descripción</th>
				<th class="text-md-center">Persona de contacto</th>
				<th class="text-md-center">Teléfono de contacto</th>
				<th class="text-md-center">Correo electrónico</th>
				<th class="text-md-center">Provincia</th>
				<th class="text-md-center">Opciones</th>
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
				<td class="opciones">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="?ctrl=ctrl_informacion&id=<?=$elemento['id']?>" class="btn btn-sm btn-info" title="Información"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="?ctrl=ctrl_mod_psico&id=<?=$elemento['id']?>" class="btn btn-sm btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</li>
					</ul>
				</td>
			</tr> <?php
		}
	} ?>
</tbody>
</table>
<?= Paginacion($total_ofertas, $tamano_pagina, $total_paginas, $pagina, "ctrl_psico"); ?>
</div>