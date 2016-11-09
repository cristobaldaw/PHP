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
		<table class="table table-bordered">
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


<!-- Modal añadir -->
<div class="modal fade" id="anadir" tabindex="-1" role="dialog" aria-labelledby="anadir" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-md-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Introduzca los datos del nuevo usuario</strong>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="usuario">Usuario</label>
							<input type="text" class="form-control" name="usuario">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="pass">Contraseña</label>
							<input type="password" class="form-control" name="pass">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="conf_pass">Confirmar contraseña</label>
							<input type="password" class="form-control" name="conf_pass">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-8 offset-md-2">
							<label for="tipo">Tipo de usuario</label><br>
							<?= CreaRadio("tipo", $tipos) ?>
						</div>
					</div>
					<div class="text-md-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary" name="btn_anadir">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>