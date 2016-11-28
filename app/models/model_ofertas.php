<?php
include_once "class_bd.php";

/**
 * Estados de una oferta
 * @var array $estados
 */
$estados = array(
		"P" => "Pendiente de iniciar selección",
		"R" => "Realizando selección",
		"S" => "Seleccionado candidato",
		"C" => "Cancelada");

/**
 * Criterios de búsqueda
 * @var array $campos
 */
$criterios = array(
		"=" => "Igual",
		"like" => "Contiene",
		"&gt;" => "Mayor",
		"&lt;" => "Menor");

/**
 * Campos por los que se puede ordenar
 * @var array $orderby
 */
$orderby = array(
	"fecha_creacion" => "Fecha de creación",
	"descripcion" => "Descripción",
	"persona_contacto" => "Persona de contacto",
	"telefono_contacto" => "Teléfono de contacto",
	"email" => "Correo electrónico");

/**
 * Maneras en las que se puede ordenar
 * @var array $orden
 */
$orden = array(
	"asc" => "Ascendente",
	"desc" => "Descendente");

/**
 * Tamaños de página disponibles
 * @var array $tamano_pagina
 */
$tamano_pagina = array(
	"5" => "5",
	"10" => "10",
	"15" => "15",
	"20" => "20");

/**
 * Inserta una oferta en la base de datos
 * @param string $campos Datos de la oferta
 */
function InsertaOferta($campos) {
	$campos["estado"] = (!isset($campos["estado"])) ? "" : $campos["estado"];
	$campos["fecha_comunicacion"] = (EstaVacio($campos["fecha_comunicacion"])) ? "NULL" : $campos["fecha_comunicacion"];
	$conex = BD::getInstance();
	$sql = "insert into tbl_ofertas (descripcion, persona_contacto, telefono_contacto, email, direccion, poblacion, codigo_postal, provincia, estado, fecha_comunicacion, psicologo_encargado, candidato_seleccionado, otros_datos_candidato) values ('$campos[descripcion]', '$campos[persona_contacto]', '$campos[telefono_contacto]', '$campos[email]', '$campos[direccion]', '$campos[poblacion]', '$campos[codigo_postal]', '$campos[provincia]', '$campos[estado]', STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), '$campos[psicologo_encargado]', '$campos[candidato_seleccionado]', '$campos[otros_datos_candidato]')";
	$conex->Ejecutar($sql);
}

/**
 * Lista de ofertas, teniendo en cuenta la paginación y el orden
 * @param int $inicio Inicio de la página
 * @param int $tamano_pagina Tamaño de la página
 * @param string $orderby Campo por el que se ordena
 * @param string $orden Orden por el que se ordena
 * @return array
 */
function ListaOfertas($inicio, $tamano_pagina, $orderby, $orden) {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_ofertas order by $orderby $orden limit $inicio, $tamano_pagina");
	$lista = [];
	while ($rs = $conex->LeeRegistro()) {
		$lista[] = $rs;
	}
	return $lista;
}

/**
 * Total de ofertas disponibles
 * @return array
 */
function TotalOfertas() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_ofertas");
	$rs = $conex->LeeRegistro();
	return $rs["total"];
}

/**
 * Elimina una oferta de la base de datos
 * @param string $id ID de la oferta
 */
function EliminaOferta($id) {
	$conex = BD::getInstance();
	$sql = "delete from tbl_ofertas where id = '$id'";
	$conex->Ejecutar($sql);
}

/**
 * Modifica todos los datos de una oferta en la base de datos. Solo disponible para administrador
 * @param int $id ID de la oferta
 * @param array $datos Datos de la oferta
 */
function ModificaOfertaAdmin($id, $datos) {
	$datos["estado"] = (!isset($datos["estado"])) ? "" : $datos["estado"];
	$datos["fecha_comunicacion"] = (EstaVacio($datos["fecha_comunicacion"])) ? "NULL" : $datos["fecha_comunicacion"];
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set descripcion = '$datos[descripcion]', persona_contacto = '$datos[persona_contacto]', telefono_contacto = '$datos[telefono_contacto]', email = '$datos[email]', direccion = '$datos[direccion]', poblacion = '$datos[poblacion]', codigo_postal = '$datos[codigo_postal]', provincia = '$datos[provincia]', estado = '$datos[estado]', fecha_comunicacion = STR_TO_DATE('$datos[fecha_comunicacion]', '%d/%m/%Y'), psicologo_encargado = '$datos[psicologo_encargado]', candidato_seleccionado = '$datos[candidato_seleccionado]', otros_datos_candidato = '$datos[otros_datos_candidato]' where id = '$id'";
	$conex->Ejecutar($sql);
}

/**
 * Modifica solo algunos datos de una oferta en la base de datos. Solo disponible para psicólogo
 * @param int $id ID de la oferta
 * @param array $datos Datos de la oferta
 */
function ModificaOfertaPsico($id, $datos) {
	$datos["estado"] = (!isset($datos["estado"])) ? "" : $datos["estado"];
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set estado = '$datos[estado]', candidato_seleccionado = '$datos[candidato_seleccionado]', otros_datos_candidato = '$datos[otros_datos_candidato]' where id = '$id'";
	$conex->Ejecutar($sql);
}

/**
 * Busca ofertas en la base de datos
 * @param array $datos Datos de la búsqueda
 * @param int $inicio Inicio de la paginación
 * @param int $tamano_pagina Tamaño de la página
 * @return array Resultados de la búsqueda
 */
function BuscaOfertas($datos, $inicio='', $tamano_pagina='') {
	$resultados = [];
	$conex = BD::getInstance();
	if(!empty(trim($datos["descripcion"]))) {
		if ($datos["criterio1"] == "cont") {
			$datos["descripcion"] = "%".$datos["descripcion"]."%";
		}
		$query[] = "descripcion " .  html_entity_decode($datos['criterio1']) . " '" . $datos["descripcion"] . "'";
	}
	if(!empty(trim($datos["fecha_creacion"]))) {
		$datos["fecha_creacion"] = "STR_TO_DATE('" . $datos["fecha_creacion"] . "', '%d/%m/%Y')";
		if ($datos["criterio2"] == "cont") {
			$datos["fecha_creacion"] = "%".$datos["fecha_creacion"]."%";
		}
		$query[] = "fecha_creacion " .  html_entity_decode($datos['criterio2']) . " " . $datos["fecha_creacion"] ;
	}
	if(!empty(trim($datos["persona_contacto"]))) {
		if ($datos["criterio3"] == "cont") {
			$datos["persona_contacto"] = "%".$datos["persona_contacto"]."%";
		}
		$query[] = "persona_contacto " .  html_entity_decode($datos['criterio3']) . " '" . $datos["persona_contacto"] . "'";
	}
	if (!empty($tamano_pagina)) {
		$sql = "select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion from tbl_ofertas where " . implode(" and ", $query) . "order by fecha_creacion desc limit $inicio, $tamano_pagina";
	} else {
		$sql = "select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion from tbl_ofertas where " . implode(" and ", $query) . "order by fecha_creacion desc";
	}
	
	$conex->Consulta($sql);
	while ($rs = $conex->LeeRegistro()) {
		$resultados[] = $rs;
	}
	return $resultados;
}

/**
 * Número total de resultados de una búsqueda
 * @param array $campos Datos de la búsqueda
 * @return int Total de resultados de la búsqueda
 */
function TotalResultados($campos) {
	$resultados = BuscaOfertas($campos);
	return count($resultados);
}


/**
 * Todos los datos de una oferta
 * @param int $id ID de la oferta
 * @return array
 */
function DatosUnaOferta($id) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion, DATE_FORMAT(fecha_comunicacion,'%d/%m/%Y') as fecha_comunicacion from tbl_ofertas where id = '$id'");
	$rs = $conex->LeeRegistro();
	return $rs;
}

/**
 * Convierte el carácter de estado en su correspondiente texto
 * @param unknown $estado Estado de la oferta
 * @return string
 */
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
		default:
			$texto = "Sin estado asignado";
			break;
	}
	return $texto;
}

/**
 * Nos dice el número de días que han pasado desde la fecha de creación
 * @param string $fecha_creacion Fecha de creación
 * @return string
 */
function HaceXDias($fecha_creacion) {
	$fecha_creacion = date_format(date_create($fecha_creacion), "d/m/Y");
	$fecha_creacion = explode("/", $fecha_creacion);
	$fecha_creacion = date_create($fecha_creacion[2] . "-" . $fecha_creacion[1] . "-" . $fecha_creacion[0]);
	$hoy = date_create("now");
	$interval = date_diff($fecha_creacion, $hoy);
	$diferencia = $interval->format('%a');
	switch ($diferencia) {
		case 0:
			return "Hoy";
			break;
		case 1:
			return "Ayer";
			break;
		default:
			return "Hace " . $diferencia . " días";
			break;
	}
}