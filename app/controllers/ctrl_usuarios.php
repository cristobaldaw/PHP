<?php
include MODEL_PATH."model_usuarios.php";
include HELP_PATH."helper.php";
$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");
$tamano_pagina = 5;
if (!isset($_GET["pagina"])) {
    $inicio = 0;
    $pagina = 1;
} else {
	$pagina = $_GET["pagina"];
    $inicio = ($pagina - 1) * $tamano_pagina;
}

$total_usuarios = TotalUsuarios();
$total_paginas = ceil($total_usuarios / $tamano_pagina);
$usuarios = ListaUsuariosPaginacion($inicio, $tamano_pagina);

include VIEW_PATH."view_usuarios.php";
