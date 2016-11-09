<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");
$datos = DatosUsuarioByID($_GET['id']);
if (!isset($_POST["conf_modificar"])) {
	include VIEW_PATH."view_modificar_usuario.php";
} else {
	ModificaUsuario($_POST);
	header("location: ?ctrl=ctrl_usuarios");
}