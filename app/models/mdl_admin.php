<?php
include_once "bd_singleton.php";

function ListaOfertasPaginacion($inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion from tbl_ofertas order by fecha_creacion desc limit $inicio, $tamano_pagina");
	while ($reg = $conex->LeeRegistro()) {
		$lista[] = $reg;
	}
	if (!empty($lista)) {
		return $lista;
	}
}

function TotalOfertas() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_ofertas");
	while ($reg = $conex->LeeRegistro()) {
		$total = $reg;
	}
	return $total;
}