<?php
include "../models/filtrado.php";
include "../models/mdl_anadir.php";
include_once "../models/funciones.php";
$listaprovincias = ListaProvincias();
$estados = array(
	"P" => "Pendiente de iniciar selección",
	"R" => "Realizando selección",
	"S" => "Seleccionado candidato",
	"C" => "Cancelada");
if (!$_POST) {
	include "../views/view_anadir.php";
} else {
	$errores = Errores();
	if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
		include "../views/view_anadir.php";
	} else {
		if (!isset($_POST["estado"])) {
			$_POST["estado"] = "";
		}
		if (empty(trim($_POST["fecha_comunicacion"]))) {
			$_POST["fecha_comunicacion"] = "NULL";
		}
		InsertaOferta($_POST);
		include "../views/insertado_exito.php";
	}
}