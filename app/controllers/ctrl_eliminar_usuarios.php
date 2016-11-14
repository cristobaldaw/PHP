<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	$datos = DatosUsuario("id", $_GET['id']);
	foreach ($datos as $dato) {
		$usuario = $dato["usuario"];
	}
	if ($_SESSION["usuario"] == $usuario) {
		$error = true;
	}
	if (!$_POST) {
		include VIEW_PATH."view_eliminar_usuarios.php";
	} else {
		EliminaUsuario($_GET['id']);
		header("location: ?ctrl=ctrl_usuarios");
	}
} else {
	header("location: index.php");
}