<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$listaprovincias = ListaProvincias();
	$ref_volver1 = RefVolver();
	
	if (!$_POST) {
		include VIEW_PATH."view_anadir.php";
	} else {
		$errores = FiltradoOfertas();
		if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
			include VIEW_PATH."view_anadir.php";
		} else {
			if (!isset($_POST["estado"])) {
				$_POST["estado"] = "";
			}
			if (EstaVacio($_POST["fecha_comunicacion"])) {
				$_POST["fecha_comunicacion"] = "NULL";
			}
			InsertaOferta($_POST);
			$ref_volver2 = "ctrl_admin";
			$accion = "añadido";
			include VIEW_PATH."exito.php";
		}
	}
} else {
	header("location: index.php");
}