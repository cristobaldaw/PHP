<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";

	$datos = DatosUsuarioByID($_GET['id']);
	if (!isset($_POST["conf_modificar"])) {
		include VIEW_PATH."view_modificar_usuario.php";
	} else {
		ModificaUsuario($_POST);
		header("location: ?ctrl=ctrl_usuarios");
	}
} else {
	header("location: index.php");
}