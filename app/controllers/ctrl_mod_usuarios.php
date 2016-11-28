<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	$datos = DatosUsuario("id", $_GET['id']);
	if (!$_POST) {
		$errores = false;
		include VIEW_PATH."view_mod_usuarios.php";
	} else {
		$errores = FiltradoUsuarios($modificar = true);
		if ($errores) {
			include VIEW_PATH."view_mod_usuarios.php";
		} else {
			if ($_SESSION["usuario"] == $datos["usuario"]) { // Si modifico el usuario que está logueado, modifico los datos de la sesión
				ModificaSesion($_POST["usuario"], $_POST["tipo"]);
			}
			ModificaUsuario($_GET["id"], $_POST);
			header("location: ?ctrl=ctrl_usuarios");
		}
	}
} else {
	header("location: ?ctrl=ctrl_login");
}