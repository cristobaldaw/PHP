<?php
if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Psicólogo") {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
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
		"=" => "Igual",
		"cont" => "Contiene",
		"may" => "Mayor",
		"men" => "Menor");

	if (!isset($_GET["descripcion"])) {
		$total_resultados = "";
		include VIEW_PATH."view_buscar.php";
	} else {
		$resultados = Buscar($_GET, $inicio, $tamano_pagina);
		$total_resultados = TotalResultados($_GET);
		$total_paginas = ceil($total_resultados / $tamano_pagina);
		include VIEW_PATH."view_buscar.php";
	}
} else {
	header("location: index.php");
}
