<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
if (EsAdmin() || EsPsico()) { // Si está logueado va a la pantalla de inicio
	header("location: ?ctrl=ctrl_inicio");
} else {
	if ($_POST) {
		if (ExisteUsuario($_POST["usuario"])) { // Si existe el usuario saco sus datos
			$datos = DatosUsuario("usuario", $_POST["usuario"]);
			if ($_POST["pass"] == $datos["pass"]) { // Si el login es correcto guardo los datos en sesión
				$_SESSION["usuario"] = $datos["usuario"];
				$_SESSION["tipo_usuario"] = ($datos["tipo"] == "A") ? "administrador" : "psicólogo";
				$_SESSION["hora"] = date("H:i");
				header("location: ?ctrl=ctrl_inicio");
			} else { // Si el login no es correcto
				$error = true; 
			}
		} else { // Si el usuario no existe
			$error = true;
		}
	}
	include VIEW_PATH."view_login.php";
}