<div class="container">
	<div class="col-md-6 offset-md-3">
		<div class="card card-block text-md-center">
			<?php
			if (isset($error)) { ?>
				<h2>No se puede eliminar este usuario</h2><br>
				<a href="?ctrl=ctrl_usuarios" class="btn btn-primary">Volver</a> <?php
			} else { ?>
				<h3 class="card-title">¿Desea eliminar este usuario?</h3>
				<form method="post">
					<?php
					foreach ($datos as $dato) { ?>
						<p class="card-text"><strong>Nombre de usuario: </strong><?=$dato['usuario']?></p>
						<p class="card-text"><strong>Contraseña: </strong><?=$dato['pass']?></p >
						<p class="card-text"><strong>Tipo de usuario: </strong><?=TipoUsuario($dato['tipo'])?></p > <?php
					} ?>
					<div class="text-md-center">
						<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary">Cancelar</a>
						<button type="submit" class="btn btn-primary" name="conf_eliminar">Eliminar</button>
					</div>
				</form>
			</div> <?php
		} ?>
	</div>
</div>