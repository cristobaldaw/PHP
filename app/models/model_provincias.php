<?php
include_once "class_bd.php";

/**
 * Devuelve el nombre de una provincia según su cod
 * @param int $cod
 * @return string
 */
function NombreProvincia($cod) {
	$conex = BD::getInstance();
	$conex->Consulta("select nombre from tbl_provincias where cod = '$cod'");
	$rs = $conex->LeeRegistro();
	return $rs["nombre"];	
}

/**
 * Devuelve la lista de provincias ordenadas alfabéticamente
 * @return array
 */
function ListaProvincias() {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_provincias order by nombre");
	while ($rs = $conex->LeeRegistro()) {
		$provincias[$rs["cod"]] = $rs["nombre"];
	}
	return $provincias;
}