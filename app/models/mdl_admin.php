<?php
include "bd_singleton.php";

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

function DatosUnaOferta($id) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_comunicacion from tbl_ofertas where id = '$id'");
	while ($reg = $conex->LeeRegistro()) {
		$datos[] = $reg;
	}
	return $datos;
}

function EliminaOferta($id) {
	$conex = BD::getInstance();
	$sql = "delete from tbl_ofertas where id = '$id'";
	$conex->Ejecutar($sql);
}

function TotalOfertas() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_ofertas");
	while ($reg = $conex->LeeRegistro()) {
		$total = $reg;
	}
	return $total;
}