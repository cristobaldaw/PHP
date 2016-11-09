<div class="container">
	<div class="card card-formulario col-md-6 offset-md-3" id="card_login">
		<?php
		if (!empty($errores)) { ?>
			<div class="alert alert-danger col-md-8 offset-md-2">
				<ul> <?php
					foreach ($errores as $error) { ?>
						<li><?=$error["error"]?></li> <?php
					} ?>
				</ul>
			</div> <?php
		} ?>
		<form method="post">
			<div class="row">
				<div class="form-group col-md-8 offset-md-2">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" class="form-control" value="<?=ValorPost('usuario')?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-8 offset-md-2">
					<label for="pass">Contraseña</label>
					<input type="password" name="pass" class="form-control" value="<?=ValorPost('pass')?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<button type="submit" class="btn btn-primary btn-grande">Entrar</button>
				</div>
			</div>
		</form>
	</div>
</div>