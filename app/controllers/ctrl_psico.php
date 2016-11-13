<?php
include MODEL_PATH."model_usuarios.php";
if (EsPsico()) {
	include_once MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include_once HELP_PATH."helper.php";
	// Paginación
	$tamano_pagina = 10;
	if (!isset($_GET["page"])) {
	    $inicio = 0;
	    $page = 1;
	} else {
		$page = $_GET["page"];
	    $inicio = ($page - 1) * $tamano_pagina;
	}
	
	unset($_SESSION["url_buscar"]);
	$_SESSION["page"] = $page;
	$total_ofertas = TotalOfertas();
	$total_paginas = ceil($total_ofertas / $tamano_pagina);
	$lista = ListaOfertasPaginacion($inicio, $tamano_pagina);
	include VIEW_PATH."view_psico.php";
} else {
	header("location: index.php");
}