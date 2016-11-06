<?php
include_once HELP_PATH."helper.php";
$errores = array();
if (isset($_GET["campo"]) && EstaVacio($_GET["campo"])) {
	array_push($errores, array("bool" => true, "error" => "Introduzca el campo por el que desea buscar."));
}
if (isset($_GET["busqueda"]) && EstaVacio($_GET["busqueda"])) {
	array_push($errores, array("bool" => true, "error" => "Introduzca texto para buscar."));
}