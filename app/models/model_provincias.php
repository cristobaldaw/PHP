<?php
include_once "bd_singleton.php";

function NombreProvincia($cod) {
	$conex = BD::getInstance();
	$conex->Consulta("select nombre from tbl_provincias where cod = '$cod'");
	while ($rs = $conex->LeeRegistro()) {
		$nombre = $rs;
	}
	if (!empty($nombre)) {
		return $nombre["nombre"];
	}
}

function ListaProvincias() {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_provincias order by nombre");
	while ($rs = $conex->LeeRegistro()) {
		$provincias[$rs["cod"]] = $rs["nombre"];
	}
	return $provincias;
}