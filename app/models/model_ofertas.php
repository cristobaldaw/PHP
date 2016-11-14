<?php
include_once "bd_singleton.php";

$estados = array(
		"P" => "Pendiente de iniciar selección",
		"R" => "Realizando selección",
		"S" => "Seleccionado candidato",
		"C" => "Cancelada");

$campos = array(
		"=" => "Igual",
		"cont" => "Contiene",
		"may" => "Mayor",
		"men" => "Menor");

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

function ModificaOfertaAdmin($id, $campos) {
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set descripcion = '$campos[descripcion]', persona_contacto = '$campos[persona_contacto]', telefono_contacto = '$campos[telefono_contacto]', email = '$campos[email]', direccion = '$campos[direccion]', poblacion = '$campos[poblacion]', codigo_postal = '$campos[codigo_postal]', provincia = '$campos[provincia]', estado = '$campos[estado]', fecha_comunicacion = STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), psicologo_encargado = '$campos[psicologo_encargado]', candidato_seleccionado = '$campos[candidato_seleccionado]', otros_datos_candidato = '$campos[otros_datos_candidato]' where id = '$id'";
	$conex->Ejecutar($sql);
}

function ModificaOfertaPsico($id, $estado, $candidato_seleccionado, $otros_datos_candidato) {
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set estado = '$estado', candidato_seleccionado = '$candidato_seleccionado', otros_datos_candidato = '$otros_datos_candidato' where id = '$id'";
	$conex->Ejecutar($sql);
}

function SwitchCriterio($criterio) {
	switch ($criterio) {
		case "may":
			$crit = ">";
			break;
		case "men":
			$crit = "<";
			break;
		case "cont":
			$crit = "like";
			break;
		case "=":
			$crit = "=";
			break;
	}
	return $crit;
}

function BuscaOfertasPaginacion($campos, $inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	if(!empty(trim($campos["descripcion"]))) {
		if ($campos["criterio1"] == "cont") {
			$campos["descripcion"] = "%".$campos["descripcion"]."%";
		}
		$query[] = "descripcion " .  SwitchCriterio($campos['criterio1']) . " '" . $campos["descripcion"] . "'";
	}
	if(!empty(trim($campos["fecha_creacion"]))) {
		$campos["fecha_creacion"] = "STR_TO_DATE('" . $campos["fecha_creacion"] . "', '%d/%m/%Y')";
		if ($campos["criterio2"] == "cont") {
			$campos["fecha_creacion"] = "%".$campos["fecha_creacion"]."%";
		}
		$query[] = "fecha_creacion " .  SwitchCriterio($campos['criterio2']) . " " . $campos["fecha_creacion"] ;
	}
	if(!empty(trim($campos["persona_contacto"]))) {
		if ($campos["criterio3"] == "cont") {
			$campos["persona_contacto"] = "%".$campos["persona_contacto"]."%";
		}
		$query[] = "persona_contacto " .  SwitchCriterio($campos['criterio3']) . " '" . $campos["persona_contacto"] . "'";
	}
	$sql = "select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha from tbl_ofertas where " . implode(" and ", $query) . "order by fecha_creacion desc limit $inicio, $tamano_pagina";
	$conex->Consulta($sql);
	while ($rs = $conex->LeeRegistro()) {
		$resultados[] = $rs;
	}
	if (!empty($resultados)) {
		return $resultados;
	}
}

function TotalResultados($campos) {
	$conex = BD::getInstance();
	if(!empty(trim($campos["descripcion"]))) {
		if ($campos["criterio1"] == "cont") {
			$campos["descripcion"] = "%".$campos["descripcion"]."%";
		}
		$query[] = "descripcion " .  SwitchCriterio($campos['criterio1']) . " '" . $campos["descripcion"] . "'";
	}
	if(!empty(trim($campos["fecha_creacion"]))) {
		$campos["fecha_creacion"] = "STR_TO_DATE('" . $campos["fecha_creacion"] . "', '%d/%m/%Y')";
		if ($campos["criterio2"] == "cont") {
			$campos["fecha_creacion"] = "%".$campos["fecha_creacion"]."%";
		}
		$query[] = "fecha_creacion " .  SwitchCriterio($campos['criterio2']) . " " . $campos["fecha_creacion"] ;
	}
	if(!empty(trim($campos["persona_contacto"]))) {
		if ($campos["criterio3"] == "cont") {
			$campos["persona_contacto"] = "%".$campos["persona_contacto"]."%";
		}
		$query[] = "persona_contacto " .  SwitchCriterio($campos['criterio3']) . " '" . $campos["persona_contacto"] . "'";
	}
	$sql = "select count(*) as total from tbl_ofertas where " . implode(" and ", $query);
	$conex->Consulta($sql);
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	if (empty($total)) {
		return 0;
	} else {
		return $total["total"];
	}
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

function RefVolver() {
	if (isset($_SESSION["url_buscar"])) {
		$ctrl = "?" . $_SESSION["url_buscar"];
	}
	elseif (EsAdmin()) {
		$ctrl = "?ctrl=ctrl_admin";
	} else {
		$ctrl = "?ctrl=ctrl_psico";
	}
	
	if (isset($_SESSION["page"]) && !isset($_SESSION["url_buscar"])) {
		$page = "&page=" . $_SESSION["page"];
	} else {
		$page = "";
	}
	return $ctrl . $page;
}