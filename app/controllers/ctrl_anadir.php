<?php
if ($_SESSION["tipo_usuario"] == "Administrador") {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$listaprovincias = ListaProvincias();
	
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
			$ref_volver = "ctrl_admin";
			$accion = "añadido";
			include VIEW_PATH."exito.php";
		}
	}
} else {
	header("location: index.php");
}