<?php
include "../models/filtrado.php";
include "../models/mdl_modificar.php";
include_once "../models/funciones.php";
$datos = DatosUnaOferta($_POST["id"]);
$listaprovincias = ListaProvincias();
$estados = array(
	"P" => "Pendiente de iniciar selección",
	"R" => "Realizando selección",
	"S" => "Seleccionado candidato",
	"C" => "Cancelada");
if (!isset($_POST["modificar2"])) {
	include "../views/view_modificar.php";
} else {
	$errores = Errores();
	if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
		include "../views/view_modificar.php";
	} else {
		if (!isset($_POST["estado"])) {
			$_POST["estado"] = "";
		}
		if (empty(trim($_POST["fecha_comunicacion"]))) {
			$_POST["fecha_comunicacion"] = "NULL";
		}
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		ModificaOferta($_POST);
		include "../controllers/ctr_admin.php";
	}
}
