<?php
if ($_SESSION["tipo_usuario"] == "Psicólogo") {
	include_once MODEL_PATH."modelo.php";
	include_once HELP_PATH."helper.php";
	// Paginación
	$tamano_pagina = 10;
	if (!isset($_GET["pagina"])) {
	    $inicio = 0;
	    $pagina = 1;
	} else {
		$pagina = $_GET["pagina"];
	    $inicio = ($pagina - 1) * $tamano_pagina;
	}
		
	$total_ofertas = TotalOfertas();
	$total_paginas = ceil($total_ofertas / $tamano_pagina);
	$lista = ListaOfertasPaginacion($inicio, $tamano_pagina);
	include VIEW_PATH."view_psico.php";
} else {
	header("location: index.php");
}