</body>
<body id="body-login">
<div class="container">
	<div class="card card-block col-md-6 offset-md-3" id="card_login"> <?php
		if ($error) { ?>
			<div class="alert alert-danger col-md-8 offset-md-2">
				<ul>
					<li>Usuario/contraseña incorrectos.</li>
				</ul>
			</div> <?php
		} ?>
		<form method="post">
			<div class="form-group col-md-8 offset-md-2">
				<label for="usuario"><strong>Usuario</strong></label>
				<input type="text" name="usuario" class="form-control" value="<?=ValorPost('usuario')?>">
			</div>
			<div class="form-group col-md-8 offset-md-2">
				<label for="pass"><strong>Contraseña</strong></label>
				<input type="password" name="pass" class="form-control">
			</div>
			<div class="col-md-8 offset-md-2">
				<button type="submit" class="btn btn-primary btn-block">Entrar</button>
			</div>
		</form>
	</div>
</div>
