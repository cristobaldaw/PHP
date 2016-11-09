<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
include HELP_PATH."filtrado_usuarios.php";
$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");
if (!$_POST) {
	include VIEW_PATH."view_anadir_usuario.php";
} else {
	$errores = FiltradoUsuarios();
	if (in_array(true, $errores)) {
		include VIEW_PATH."view_anadir_usuario.php";
	} else {
		AnadirUsuario($_POST);
		header("location: ?ctrl=ctrl_usuarios");
	}
}