<?php
include "bd_singleton.php";

function InsertaOferta($campos) {
	$conex = BD::getInstance();
	$sql = "insert into tbl_ofertas (descripcion, persona_contacto, telefono_contacto, email, direccion, poblacion, codigo_postal, provincia, estado, fecha_comunicacion, psicologo_encargado, candidato_seleccionado, otros_datos_candidato) values ('$campos[descripcion]', '$campos[persona_contacto]', '$campos[telefono_contacto]', '$campos[email]', '$campos[direccion]', '$campos[poblacion]', '$campos[codigo_postal]', '$campos[provincia]', '$campos[estado]', STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), '$campos[psicologo_encargado]', '$campos[candidato_seleccionado]', '$campos[otros_datos_candidato]')";
	$conex->Ejecutar($sql);
}

function ListaOfertasPaginacion($inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion from tbl_ofertas order by fecha_creacion desc limit $inicio, $tamano_pagina");
	while ($rs = $conex->LeeRegistro()) {
		$lista[] = $rs;
	}
	if (!empty($lista)) {
		return $lista;
	}
}

function TotalOfertas() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_ofertas");
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	return $total["total"];
}

function EliminaOferta($id) {
	$conex = BD::getInstance();
	$sql = "delete from tbl_ofertas where id = '$id'";
	$conex->Ejecutar($sql);
}

function ModificaOferta($campos) {
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set descripcion = '$campos[descripcion]', persona_contacto = '$campos[persona_contacto]', telefono_contacto = '$campos[telefono_contacto]', email = '$campos[email]', direccion = '$campos[direccion]', poblacion = '$campos[poblacion]', codigo_postal = '$campos[codigo_postal]', provincia = '$campos[provincia]', estado = '$campos[estado]', fecha_comunicacion = STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), psicologo_encargado = '$campos[psicologo_encargado]', candidato_seleccionado = '$campos[candidato_seleccionado]', otros_datos_candidato = '$campos[otros_datos_candidato]' where id = '$campos[id]'";
	$conex->Ejecutar($sql);
}

function BuscaOfertaPaginacion($campo, $busqueda, $inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_ofertas where lower($campo) like lower('$busqueda%') limit $inicio, $tamano_pagina");
	while ($rs = $conex->LeeRegistro()) {
		$lista[] = $rs;
	}
	if (!empty($lista)) {
		return $lista;
	}
}

function TotalResultados($campo, $busqueda) {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_ofertas where lower($campo) like ('$busqueda%')");
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	return $total["total"];
}

function DatosUnaOferta($id) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion, DATE_FORMAT(fecha_comunicacion,'%d/%m/%Y') as fecha_comunicacion from tbl_ofertas where id = '$id'");
	while ($rs = $conex->LeeRegistro()) {
		$datos[] = $rs;
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
	while ($rs = $conex->LeeRegistro()) {
		$provincias[$rs["cod"]] = $rs["nombre"];
	}
	return $provincias;
}