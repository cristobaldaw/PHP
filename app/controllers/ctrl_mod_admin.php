<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."filtrados.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	$datos = DatosUnaOferta($_GET["id"]);
	$listaprovincias = ListaProvincias();
	$ref_volver1 = RefVolver();

	if (!$_POST) {
		include VIEW_PATH."view_mod_admin.php";
	} else {
		$errores = FiltradoOfertas();
		if (!empty($errores)) {
			include VIEW_PATH."view_mod_admin.php";
		} else {
			if (!isset($_POST["estado"])) {
				$_POST["estado"] = "";
			}
			if (EstaVacio($_POST["fecha_comunicacion"])) {
				$_POST["fecha_comunicacion"] = "NULL";
			}
			ModificaOfertaAdmin($_GET['id'], $_POST);
			$accion = "modificado";
			$ref_volver2 = isset($_SESSION["url_buscar"]) ? $_SESSION["url_buscar"] : "ctrl=ctrl_admin";
			include VIEW_PATH."exito.php";
		}
	}
} else {
	header("location: index.php");
}
