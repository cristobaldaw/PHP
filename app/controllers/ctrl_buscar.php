<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin() || EsPsico()) {
	if (EsAdmin()) {
		$mod = "ctrl_mod_admin";
	} else {
		$mod = "ctrl_mod_psico";
	}
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	$ref_volver1 = (EsAdmin()) ? "ctrl_admin" : 'ctrl_psico';

	$tamano_pagina = 10;
	if (!isset($_GET["page"])) {
	    $inicio = 0;
	    $page = 1;
	} else {
		$page = $_GET["page"];
	    $inicio = ($page - 1) * $tamano_pagina;
	}

	$total_resultados = "";
	if (!isset($_GET["descripcion"])) {
		include VIEW_PATH."view_buscar.php";
	} else {
		if (EstaVacio($_GET["descripcion"]) && EstaVacio($_GET["fecha_creacion"]) && EstaVacio($_GET["persona_contacto"])) {
			$error = true;
		}
		if (isset($error)) {
			include VIEW_PATH."view_buscar.php";
		} else {
			$_SESSION["url_buscar"] = $_SERVER['QUERY_STRING'];
			$resultados = BuscaOfertasPaginacion($_GET, $inicio, $tamano_pagina);
			$total_resultados = TotalResultados($_GET);
			$total_paginas = ceil($total_resultados / $tamano_pagina);
			include VIEW_PATH."view_buscar.php";
		}
	}
} else {
	header("location: index.php");
}
