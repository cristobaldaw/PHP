<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	// Tamaño de la página
	if (isset($_POST["tamano_pagina"])) {
		$_SESSION["tamano_pagina"] = $_POST["tamano_pagina"];
		header("location: ?ctrl=ctrl_admin&page=1"); // Si se cambia el tamaño de la página, vuelvo a la primera página
	}
	if (!isset($_SESSION["tamano_pagina"])) { // El tamaño de página por defecto es 10
		$_SESSION["tamano_pagina"] = 10;
	}
	// Criterio de ordenación
	if (isset($_POST["orderby"])) {
		$_SESSION["orderby"] = $_POST["orderby"];
		$_SESSION["orden"] = $_POST["orden"];
	}
	if (!isset($_SESSION["orderby"])) { // Por defecto se ordena por fecha de creación de forma descendente
		$_SESSION["orderby"] = "fecha_creacion";
		$_SESSION["orden"] = "desc";
	}

	// Paginación
	if (!isset($_GET["page"])) {
	    $inicio = 0;
	    $_SESSION["page"] = 1;
	} else {
		$_SESSION["page"] = $_GET["page"];
	    $inicio = ($_SESSION["page"] - 1) * $_SESSION["tamano_pagina"];
	}
	
	unset($_SESSION["url_buscar"]);
	$lista = ListaOfertasPaginacion($inicio, $_SESSION["tamano_pagina"], $_SESSION["orderby"], $_SESSION["orden"]);
	$total_ofertas = TotalOfertas();
	$total_paginas = ceil($total_ofertas / $_SESSION["tamano_pagina"]);
	include VIEW_PATH."view_admin.php";
} else {
	header("location: index.php");
}