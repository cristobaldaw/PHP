<?php
include MODEL_PATH."model_usuarios.php";
include MODEL_PATH."model_ofertas.php";
include MODEL_PATH."model_provincias.php";
include HELP_PATH."helper.php";
// include MODEL_PATH."datos_random.php";
// DatosRandom();
if (EsAdmin() || EsPsico()) {
	$mod = (EsAdmin()) ? "ctrl_mod_admin" : "ctrl_mod_psico";
	if (isset($_POST["tamano_pagina"])) {
		$_SESSION["tamano_pagina"] = $_POST["tamano_pagina"];
		header("location: ?ctrl=ctrl_inicio&page=1"); // Si se cambia el tamaño de la página, vuelvo a la primera página
	}
	if (!isset($_SESSION["tamano_pagina"])) { // El tamaño de página por defecto es 5
		$_SESSION["tamano_pagina"] = 5;
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
	$lista = ListaOfertas($inicio, $_SESSION["tamano_pagina"], $_SESSION["orderby"], $_SESSION["orden"]);
	$total_ofertas = TotalOfertas();
	$total_paginas = ceil($total_ofertas / $_SESSION["tamano_pagina"]);
	include VIEW_PATH."view_inicio.php";
} else {
	header("location: ?ctrl=ctrl_login");
}