<div class="container">
	<div class="col-md-4">
		<div class="list-group">
			<a class="list-group-item disabled text-md-center list-inverse">
			Opciones
			</a>
			<a href="?ctrl=ctrl_anadir_usuarios" class="list-group-item">Añadir usuario</a>
		</div>
	</div>
	<div class="col-md-8">
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
		<?= Paginacion($total_usuarios, $tamano_pagina, $total_paginas, $pagina, "ctrl_usuarios"); ?>
	</div>
</div>