<?php
include_once "../models/modelo.php";
include_once "../helpers/helper.php";
// Paginación
$tamano_pagina = 10;
if (!isset($_GET["pagina"])) {
    $inicio = 0;
    $pagina = 1;
} else {
	$pagina = $_GET["pagina"];
    $inicio = ($pagina - 1) * $tamano_pagina;
}

$campos = array(
	"descripcion" => "Descripción",
	"persona_contacto" => "Persona de contacto",
	"email" => "Correo electrónico");
	
$total_ofertas = TotalOfertas();
$total_paginas = ceil($total_ofertas / $tamano_pagina);
$lista = ListaOfertasPaginacion($inicio, $tamano_pagina);
include "../views/view_admin.php";