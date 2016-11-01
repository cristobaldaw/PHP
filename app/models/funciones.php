<?php
include_once "bd_singleton.php";

function DatosUnaOferta($id) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion, DATE_FORMAT(fecha_comunicacion,'%d/%m/%Y') as fecha_comunicacion from tbl_ofertas where id = '$id'");
	while ($reg = $conex->LeeRegistro()) {
		$datos[] = $reg;
	}
	return $datos;
}

function TextoEstado($estado) {
	$texto = "";
	switch ($estado) {
		case "P":
			$texto = "Pendiente de iniciar selección";
			break;
		case "R":
			$texto = "Realizando selección";
			break;
		case "S":
			$texto = "Seleccionado candidato";
			break;
		case "C":
			$texto = "Cancelada";
			break;
	}
	return $texto;
}

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
	while ($reg = $conex->LeeRegistro()) {
		$provincias[$reg["cod"]] = $reg["nombre"];
	}
	return $provincias;
}