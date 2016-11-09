<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");
$usuarios = ListaUsuarios();
if (isset($_POST["btn_anadir"])) {
	AnadirUsuario($_POST);
	$usuarios = ListaUsuarios();
	include VIEW_PATH."view_usuarios.php";
} elseif (isset($_POST["btn_eliminar"])) {
	EliminaUsuario($_POST["hidden_id"]);
	$usuarios = ListaUsuarios();
	include VIEW_PATH."view_usuarios.php";
} else {
	$usuarios = ListaUsuarios();
	include VIEW_PATH."view_usuarios.php";
}