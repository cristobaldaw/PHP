<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	$datos = DatosUsuario("id", $_GET['id']);
	if (!$_POST) {
		include VIEW_PATH."view_modificar_usuario.php";
	} else {
		$errores = FiltradoModUsuario();
		if (!empty($errores)) {
			include VIEW_PATH."view_modificar_usuario.php";
		} else {
			ModificaUsuario($_POST);
			header("location: ?ctrl=ctrl_usuarios");
		}
	}
} else {
	header("location: index.php");
}