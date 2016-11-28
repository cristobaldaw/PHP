<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	if (!$_POST) {
		$datos = DatosUnaOferta($_GET["id"]);
		$cancelar = RefCancelar();
		include VIEW_PATH."view_eliminar.php";
	} else {
		EliminaOferta($_GET["id"]);
		$accion = "eliminado";
		include VIEW_PATH."exito.php";
	}
} else {
	header("location: ?ctrl=ctrl_login");
}