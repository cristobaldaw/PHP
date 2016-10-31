<?php
include "bd_singleton.php";

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

function ListaProvincias() {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_provincias order by nombre");
	while ($reg = $conex->LeeRegistro()) {
		$provincias[$reg["cod"]] = $reg["nombre"];
	}
	return $provincias;
}

/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}

function ValorPost($nombreCampo) {
	if (isset($_POST[$nombreCampo])) {
		return $_POST[$nombreCampo];
	}
}