<?php
function DatosUnaOferta($id) {
	$conex = BD::getInstance();
	$conex->Consulta("select *, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_creacion, DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fecha_comunicacion from tbl_ofertas where id = '$id'");
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
			$texto = "Seleccionando candidato";
			break;
		case "C":
			$texto = "Cancelada";
			break;
	}
	return $texto;
}