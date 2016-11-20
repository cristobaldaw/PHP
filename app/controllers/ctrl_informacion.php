<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
if (EsAdmin() || EsPsico()) {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$id = $_GET["id"];
	$datos = DatosUnaOferta($id);
	$cancelar = RefCancelar();
	include VIEW_PATH."view_informacion.php";
} else {
	header("location: ?ctrl=ctrl_login");
}