<?php
include MODEL_PATH."model_usuarios.php";
if (EstaDentro()) {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	$error = false;
	$tamano_pagina = 5;
	
	if (!isset($_GET["page"])) {
	    $inicio = 0;
	    $_SESSION["page"] = 1;
	    $_SESSION["url_buscar"] = "?" . $_SERVER['QUERY_STRING'];
	} else {
		$_SESSION["page"] = $_GET["page"];
	    $inicio = ($_SESSION["page"] - 1) * $tamano_pagina;
	}

	$total_resultados = "";
	if (isset($_GET["descripcion"])) {
		if (EstaVacio($_GET["descripcion"]) && EstaVacio($_GET["fecha_creacion"]) && EstaVacio($_GET["persona_contacto"])) {
			$error = true;
		} else {
			$resultados = BuscaOfertas($_GET, $inicio, $tamano_pagina);
			$total_resultados = TotalResultados($_GET);
			$total_paginas = ceil($total_resultados / $tamano_pagina);
		}
	}
	include VIEW_PATH."view_buscar.php";
} else {
	header("location: ?ctrl=ctrl_login");
}
