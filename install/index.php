<?php include "../app/helpers/helper.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<title>Instalador</title>
</head>
<body> <?php
	if (!$_POST) {
		Formulario($error = false);
	} else {
		$error = HayErrores();
		if ($error)
			Formulario($error);
		else
			CreaBD();
	} ?>
</body>
</html>

<?php
/**
 * Formulario del instalador
 * @param boolean $error Indica si ha habido un error al enviar el formulario
 */
Function Formulario($error) { ?>
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<div class="card card-block">
				<h2 class="card-title text-md-center">Instalador de la base de datos</h2>
				<hr> <?php
				if ($error) { ?>
					<div class="row">
						<div class="alert alert-danger col-md-4 offset-md-4 text-md-center">
							<ul>
								<li>Datos incorrectos.</li>
							</ul> 
						</div>
					</div> <?php
				} ?>
				<form method="post">
					<div class="form-group row">
						<label for="servidor" class="col-md-3 col-form-label"><strong>Servidor</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="servidor" value="<?=ValorPost("servidor")?>"></input>
						</div>
					</div>
					<div class="form-group row">
						<label for="usuario" class="col-md-3 col-form-label"><strong>Usuario</strong></label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="usuario" value="<?=ValorPost("usuario")?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-md-3 col-form-label"><strong>Contraseña</strong></label>
						<div class="col-md-9">
							<input class="form-control" type="password" name="password">
						</div>
					</div>
					<div class="form-group row">
						<label for="base_datos" class="col-md-3 col-form-label"><strong>Base de datos</strong></label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="base_datos" value="<?=ValorPost("base_datos")?>">
						</div>
					</div>
					<div class="text-md-right">
						<input type="submit" value="Aceptar" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div> <?php
}

/**
 * Nos dice si hay errores al enviar el formulario
 * @return boolean
 */
Function HayErrores() {
	include "../app/config.php";
	if ($_POST["servidor"] != $db_conf["servidor"] || $_POST["usuario"] != $db_conf["usuario"] || $_POST["password"] != $db_conf["password"] || EstaVacio($_POST["base_datos"]))	 {
		return true;
	} else {
		return false;
	}
}

/**
 * Crea la base de datos y modifica el archivo config
 */
function CreaBD() {
	$file = fopen("../app/config.php", "w");
	fwrite($file, 
'<?php
$db_conf = array(
	"servidor" => "localhost",
	"usuario" => "root",
	"password" => "",
	"base_datos" => "' . $_POST["base_datos"] . '");');
	fclose($file);
	$creabd = "CREATE DATABASE IF NOT EXISTS `". $_POST["base_datos"] . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
	USE `". $_POST["base_datos"] . "`;";
	$sql = $creabd . file_get_contents("jobyesterdaydb.sql");
 	$db = new mysqli($_POST["servidor"], $_POST["usuario"], $_POST["password"]);
 	$db->multi_query($sql); ?>
 	<div class="card card-block text-md-center col-md-6 offset-md-3">
 		<h1>Base de datos creada con éxito</h1>
 		<a href="../app" class="btn btn-primary">Ir a la aplicación</a>
 	</div> <?php
}