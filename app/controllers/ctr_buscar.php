<?php
include_once "../models/modelo.php";
include_once "../helpers/helper.php";

$tamano_pagina = 10;
if (!isset($_GET["pagina"])) {
    $inicio = 0;
    $pagina = 1;
} else {
	$pagina = $_GET["pagina"];
    $inicio = ($pagina - 1) * $tamano_pagina;
}

session_start(); // Con esto mantengo la variable después de cambiar de página
if (isset($_POST["campo"])) {
	$_SESSION["campo"] = $_POST["campo"];
}
if (isset($_POST["busqueda"])) {
	$_SESSION["busqueda"] = $_POST["busqueda"];
}

$total_resultados = TotalResultados($_SESSION["campo"], $_SESSION["busqueda"]);
$total_paginas = ceil($total_resultados / $tamano_pagina);
$resultados = BuscaOfertaPaginacion($_SESSION["campo"], $_SESSION["busqueda"], $inicio, $tamano_pagina);
include "../views/view_buscar.php";