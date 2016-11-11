<?php
if ($_SESSION["tipo_usuario"] == "Psicólogo") {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	$datos = DatosUnaOferta($_GET["id"]);

	if (!$_POST) {
		include VIEW_PATH."view_mod_psico.php";
	} else {
		if (!isset($_POST["estado"])) {
			$_POST["estado"] = "";
		}
		ModificaOfertaPsico($_GET["id"], $_POST["estado"], $_POST["candidato_seleccionado"], $_POST["otros_datos_candidato"]);
		$accion = "modificado";
		$ref_volver = "ctrl_psico";
		include VIEW_PATH."exito.php";
	}
} else {
	header("location: index.php");
}
