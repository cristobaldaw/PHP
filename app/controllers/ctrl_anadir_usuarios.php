<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	if (!$_POST) {
		include VIEW_PATH."view_anadir_usuario.php";
	} else {
		$errores = FiltradoUsuarios();
		if (!empty($errores)) {
			include VIEW_PATH."view_anadir_usuario.php";
		} else {
			AnadirUsuario($_POST);
			header("location: ?ctrl=ctrl_usuarios");
		}
	}
} else {
	header("location: ?ctrl=ctrl_login");
}