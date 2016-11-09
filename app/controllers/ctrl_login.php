<?php
if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "Administrador") {
	header("location: ?ctrl=ctrl_admin");
} elseif (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "Psicólogo") {
	header("location: ?ctrl=ctrl_psico");
} else {
	include MODEL_PATH."model_usuarios.php";
	include HELP_PATH."helper.php";
	$errores = array();
	if (!$_POST) {
		include VIEW_PATH."view_login.php";
	} else {
		if (EstaVacio($_POST["usuario"]) || EstaVacio($_POST["pass"])) { // Si uno de los dos campos está vacío...
			array_push($errores, array("bool" => true, "error" => "Introduzca usuario y contraseña."));
			include VIEW_PATH."view_login.php";
		} else {
			if (ExisteUsuario($_POST["usuario"])) { // Si existe el usuario saco sus datos
				$datos = DatosUsuario($_POST["usuario"]);
				foreach ($datos as $dato) {
					$datos = $dato;
				}
				if ($_POST["pass"] == $datos["pass"]) { // Si el usuario coincide con la contraseña...
					if ($datos["tipo"] == "A") { // Si es administrador...
						$_SESSION["tipo_usuario"] = "Administrador";
						header("location: ?ctrl=ctrl_admin");
					} else { // Si es psicólogo...
						$_SESSION["tipo_usuario"] = "Psicólogo";
						header("location: ?ctrl=ctrl_psico");
					}
					$_SESSION["usuario"] = $dato["usuario"];
					$_SESSION["hora"] = date('H:i', time());
				} else { // Si el login no es correcto...
					array_push($errores, array("bool" => true, "error" => "Usuario y contraseña incorrectos."));
					include VIEW_PATH."view_login.php";
				}
			} else { // Si el usuario no existe...
				array_push($errores, array("bool" => true, "error" => "Usuario y contraseña incorrectos."));
				include VIEW_PATH."view_login.php";
			}
		}
	}
}