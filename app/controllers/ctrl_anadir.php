<?php
if ($_SESSION["tipo_usuario"] == "Administrador") {
	include HELP_PATH."filtrado.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	$listaprovincias = ListaProvincias();
	$estados = array(
		"P" => "Pendiente de iniciar selección",
		"R" => "Realizando selección",
		"S" => "Seleccionado candidato",
		"C" => "Cancelada");
	if (!$_POST) {
		include VIEW_PATH."view_anadir.php";
	} else {
		$errores = Errores();
		if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
			include VIEW_PATH."view_anadir.php";
		} else {
			if (!isset($_POST["estado"])) {
				$_POST["estado"] = "";
			}
			if (empty(trim($_POST["fecha_comunicacion"]))) {
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