<div class="container">
	<div class="col-md-6 offset-md-3">
		<div class="card card-block text-md-center">
			<?php
			if ($error) { ?>
				<h2>No se puede eliminar este usuario</h2>
				<a href="?ctrl=ctrl_usuarios" class="btn btn-primary">Volver</a> <?php
			} else { ?>
				<h3 class="card-title">¿Desea eliminar este usuario?</h3>
				<table class="table table-hover borderless">
					<tr>
						<td><strong>Nombre de usuario:</strong> <?=$datos['usuario']?></td>
					</tr>
					<tr>
						<td><strong>Contraseña:</strong> <?=$datos['pass']?></td>
					</tr>
					<tr>
						<td><strong>Tipo de usuario:</strong> <?=TipoUsuario($datos['tipo'])?></td>
					</tr>
				</table>
				<form method="post" class="text-md-center">
					<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary">Cancelar</a>
					<button type="submit" class="btn btn-primary" name="conf_eliminar">Eliminar</button>
				</form> <?php
			} ?>
		</div>
	</div>
</div>