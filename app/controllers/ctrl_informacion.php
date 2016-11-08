<?php
if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Psicólogo") {
	include MODEL_PATH."modelo.php";
	$id = $_GET["id"];
	$datos = DatosUnaOferta($id);
	include VIEW_PATH."view_informacion.php";
} else {
	header("location: index.php");
}