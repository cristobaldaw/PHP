<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	if (!$_POST) {
		$datos = DatosUnaOferta($_GET["id"]);
		$ref_volver1 = RefVolver();
		include VIEW_PATH."view_eliminar.php";
	} else {
		EliminaOferta($_GET["id"]);
		$accion = "eliminado";
		$ref_volver2 = "ctrl_admin";
		include VIEW_PATH."exito.php";
	}
} else {
	header("location: index.php");
}