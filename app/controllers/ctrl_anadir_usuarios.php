<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	if (!$_POST) {
		$errores = [];
		include VIEW_PATH."view_anadir_usuarios.php";
	} else {
		$errores = FiltradoUsuarios();
		if ($errores) {
			include VIEW_PATH."view_anadir_usuarios.php";
		} else {
			AnadirUsuario($_POST);
			header("location: ?ctrl=ctrl_usuarios");
		}
	}
} else {
	header("location: ?ctrl=ctrl_login");
}