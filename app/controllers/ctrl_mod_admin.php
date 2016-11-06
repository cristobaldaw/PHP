<?php
include HELP_PATH."filtrado.php";
include MODEL_PATH."modelo.php";
include HELP_PATH."helper.php";
$datos = DatosUnaOferta($_GET["id"]);
$listaprovincias = ListaProvincias();
$estados = array(
	"P" => "Pendiente de iniciar selección",
	"R" => "Realizando selección",
	"S" => "Seleccionado candidato",
	"C" => "Cancelada");
if (!isset($_POST["modificar2"])) {
	include VIEW_PATH."view_mod_admin.php";
} else {
	$errores = Errores();
	if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
		include VIEW_PATH."view_mod_admin.php";
	} else {
		if (!isset($_POST["estado"])) {
			$_POST["estado"] = "";
		}
		if (empty(trim($_POST["fecha_comunicacion"]))) {
			$_POST["fecha_comunicacion"] = "NULL";
		}
		ModificaOferta($_POST);
		$accion = "modificado";
		$ref_volver = "ctrl_admin";
		include VIEW_PATH."exito.php";
	}
}
