<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin() || EsPsico()) {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$id = $_GET["id"];
	$datos = DatosUnaOferta($id);
	$ref_volver1 = RefVolver();
	include VIEW_PATH."view_informacion.php";
} else {
	header("location: index.php");
}