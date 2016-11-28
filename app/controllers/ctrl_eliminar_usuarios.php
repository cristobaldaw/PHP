<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	$usuario = DatosUsuario("id", $_GET['id']);
	$usuario["tipo"] = ($usuario["tipo"] == "A") ? "Administrador" : "Psicólogo";
	$logueado = ($_SESSION["usuario"]) == $usuario["usuario"] ? true : false;
	if (!$_POST) {
		include VIEW_PATH."view_eliminar_usuarios.php";
	} else {
		EliminaUsuario($_GET['id']);
		if ($logueado)
			header("location: ?ctrl=logout");
		else
			header("location: ?ctrl=ctrl_usuarios");
	}
} else {
	header("location: ?ctrl=ctrl_login");
}