<?php

function FiltradoUsuarios() {
	$errores = array();
	if (EstaVacio($_POST['usuario'])) {
		array_push($errores, array("bool" => true, "error" => "Introduzca un nombre de usuario."));
	}
	if (EstaVacio($_POST["pass"]) || EstaVacio($_POST["conf_pass"])) {
		array_push($errores, array("bool" => true, "error" => "Introduzca una contraseña."));
	}
	if (!EstaVacio($_POST["pass"]) && !EstaVacio($_POST["conf_pass"]) and !ConfirmPassOK($_POST["pass"], $_POST["conf_pass"])) {
		array_push($errores, array("bool" => true, "error" => "Las contraseñas no coinciden."));
	}
	if (!isset($_POST["tipo"])) {
		array_push($errores, array("bool" => true, "error" => "Introduzca un tipo de usuario."));
	}
	if (ExisteUsuario($_POST["usuario"])) {
		array_push($errores, array("bool" => true, "error" => "El nombre de usuario ya existe."));
	}

	return $errores;
}