<?php
if ($_SESSION["tipo_usuario"] == "Administrador") {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	if (!$_POST) {
		$datos = DatosUnaOferta($_GET["id"]);
		include VIEW_PATH."view_eliminar.php";
	} else {
		EliminaOferta($_GET["id"]);
		$accion = "eliminado";
		$ref_volver = "ctrl_admin";
		include VIEW_PATH."exito.php";
	}
} else {
	header("location: index.php");
}