<?php
include MODEL_PATH."model_usuarios.php";
if (EstaDentro()) {
	include HELP_PATH."helper.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$datos = DatosUnaOferta($_GET["id"]);
	$cancelar = RefCancelar();
	include VIEW_PATH."view_informacion.php";
} else {
	header("location: ?ctrl=ctrl_login");
}