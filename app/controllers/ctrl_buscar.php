<?php
if ($_SESSION["tipo_usuario"] == "Administrador" || $_SESSION["tipo_usuario"] == "Psicólogo") {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	$ref_volver = ($_SESSION["tipo_usuario"] == "Administrador") ? "ctrl_admin" : 'ctrl_psico';

	$tamano_pagina = 10;
	if (!isset($_GET["pagina"])) {
	    $inicio = 0;
	    $pagina = 1;
	} else {
		$pagina = $_GET["pagina"];
	    $inicio = ($pagina - 1) * $tamano_pagina;
	}

	$total_resultados = "";
	if (!isset($_GET["descripcion"])) {
		include VIEW_PATH."view_buscar.php";
	} else {
		$errores = FiltradoBuscar();
		if (in_array(true, $errores)) {
			include VIEW_PATH."view_buscar.php";
		} else {
			$resultados = BuscarPaginacion($_GET, $inicio, $tamano_pagina);
			$total_resultados = TotalResultados($_GET);
			$total_paginas = ceil($total_resultados / $tamano_pagina);
			include VIEW_PATH."view_buscar.php";
		}
	}
} else {
	header("location: index.php");
}
