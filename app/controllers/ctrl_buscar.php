<?php
if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Psicólogo") {
	include MODEL_PATH."modelo.php";
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrado_buscar.php";

	$tamano_pagina = 10;
	if (!isset($_GET["pagina"])) {
	    $inicio = 0;
	    $pagina = 1;
	} else {
		$pagina = $_GET["pagina"];
	    $inicio = ($pagina - 1) * $tamano_pagina;
	}

	$campos = array(
		"descripcion" => "Descripción",
		"persona_contacto" => "Persona de contacto",
		"email" => "Correo electrónico");

	if (!isset($_GET["campo"]) && !isset($_GET["busqueda"])) { // Si el array contiene algún valor true, es que hay algún error
		$total_resultados = "";
		include VIEW_PATH."view_buscar.php";
	} else {
	if (in_array(true, $errores)) {
			$total_resultados = "";
			include VIEW_PATH."view_buscar.php";
		} else {
			$total_resultados = TotalResultados($_GET["campo"], $_GET["busqueda"]);
			$total_paginas = ceil($total_resultados / $tamano_pagina);
			$resultados = BuscaOfertaPaginacion($_GET["campo"], $_GET["busqueda"], $inicio, $tamano_pagina);
			include VIEW_PATH."view_buscar.php";
		}
	}
} else {
	header("location: index.php");
}
