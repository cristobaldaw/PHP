<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	$tamano_pagina = 5;
	if (!isset($_GET["page"])) {
	    $inicio = 0;
	    $page = 1;
	} else {
		$page = $_GET["page"];
	    $inicio = ($page - 1) * $tamano_pagina;
	}
	$total_usuarios = TotalUsuarios();
	$total_paginas = ceil($total_usuarios / $tamano_pagina);
	$usuarios = ListaUsuarios($inicio, $tamano_pagina);
	include VIEW_PATH."view_usuarios.php";
} else {
	header("location: ?ctrl=ctrl_login");
}