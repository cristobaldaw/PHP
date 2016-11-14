<div class="container">
	<div class="jumbotron jumbotron text-md-center jumbotron-gray">
		<div class="text-md-left">
			<a href="?ctrl=ctrl_admin" class="btn btn-secondary btn_volver" title="Volver"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
		</div>
		<h1 class="display-3">Gestión de usuarios</h1>
		<hr>
		<a href="?ctrl=ctrl_anadir_usuarios" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir usuario</a>
	</div>
	<div class="col-md-8 offset-md-2">
		<table class="table table-bordered table-hover">
			<thead class="table-inverse">
				<tr>
					<th class="text-md-center" class="text-md-center" class="text-md-center">Usuario</th>
					<th class="text-md-center" class="text-md-center">Contraseña</th>
					<th class="text-md-center">Tipo de usuario</th>
					<th class="text-md-center">Opciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($usuarios as $usuario) { ?>
				<tr>
					<td><?=$usuario['usuario']?></td>
					<td><?=$usuario['pass']?></td>
					<td><?=TipoUsuario($usuario['tipo'])?></td>
					<td><a href="?ctrl=ctrl_eliminar_usuarios&id=<?=$usuario['id']?>" class="btn btn-danger btn-sm" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
					<a href="?ctrl=ctrl_modificar_usuario&id=<?=$usuario['id']?>" class="btn btn-info btn-sm" title="Modificar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					</td>
				</tr> <?php
			} ?>
			</tbody>
		</table>
		<?= Paginacion($total_usuarios, $tamano_pagina, $total_paginas, $page, "ctrl_usuarios"); ?>
	</div>
</div>