<div class="container">
	<div class="col-md-6 offset-md-3">
		<div class="card card-block text-md-center">
			<h3 class="card-title">¿Desea eliminar este usuario?</h3>
			<hr class="hr_black"> <?php
			if ($logueado) { ?>
				<div class="alert alert-danger">
					<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Atención: Si elimina este usuario, se cerrará la sesión.
				</div> <?php
			} ?>
			<table class="table table-hover borderless">
				<tr>
					<td><strong>Nombre de usuario:</strong> <?=$usuario['usuario']?></td>
				</tr>
				<tr>
					<td><strong>Contraseña:</strong> <?=$usuario['pass']?></td>
				</tr>
				<tr>
					<td><strong>Tipo de usuario:</strong> <?=$usuario["tipo"]?></td>
				</tr>
			</table>
			<form method="post" class="text-md-center">
				<button type="submit" class="btn btn-primary" name="eliminar">Eliminar</button>
				<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary">Cancelar</a>
			</form>
		</div>
	</div>
</div>