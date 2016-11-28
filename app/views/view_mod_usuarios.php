<div class="container">
	<div class="col-md-6 offset-md-3">
		<div class="card card-block">
			<h3 class="card-title text-md-center">Modificar usuario</h3>
			<hr class="hr_black"> <?php
			if ($errores) { ?>
				<div class="alert alert-danger">
					<ul> <?php
						foreach ($errores as $error) { ?>
							<li><?=$error?></li> <?php
						} ?>
					</ul>
				</div> <?php
			} ?>
			<form method="post">
				<div class="form-group">
					<label for="usuario"><strong>Usuario</strong></label>
					<input type="text" name="usuario" class="form-control" value="<?=ValorPost('usuario', $datos['usuario'])?>">
				</div>
				<div class="form-group">
					<label for="pass"><strong>Contraseña</strong></label>
					<input type="password" name="pass" class="form-control">
				</div>
				<div class="form-group">
					<label for="conf_pass"><strong>Confirmar contraseña</strong></label>
					<input type="password" name="conf_pass" class="form-control">
				</div>
				<div class="form-group text-md-center">
					<label for="tipo"><strong>Tipo de usuario</strong></label><br>
					<?= CreaRadio("tipo", $tipos, ValorPost("tipo", $datos["tipo"])); ?>
				</div>
				 <div class="text-md-center">
					<button type="submit" class="btn btn-primary">Modificar</button>
					<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>