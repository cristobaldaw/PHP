<?php
include_once "bd_singleton.php";

function ModificaOferta($campos) {
	$conex = BD::GetInstance();
	$sql = "update tbl_ofertas set descripcion = '$campos[descripcion]', persona_contacto = '$campos[persona_contacto]', telefono_contacto = '$campos[telefono_contacto]', email = '$campos[email]', direccion = '$campos[direccion]', poblacion = '$campos[poblacion]', codigo_postal = '$campos[codigo_postal]', provincia = '$campos[provincia]', estado = '$campos[estado]', fecha_comunicacion = STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), psicologo_encargado = '$campos[psicologo_encargado]', candidato_seleccionado = '$campos[candidato_seleccionado]', otros_datos_candidato = '$campos[otros_datos_candidato]' where id = '$campos[id]'";
	$conex->Ejecutar($sql);
}

function CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select name="'.$name.'">';
	$html.="\n\t<option value=\"\">- Seleccione -</option>";
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

function CreaRadio($name, $opciones, $valorDefecto='') {
	foreach ($opciones as $value=>$text)
	{
		$html="";
		foreach ($opciones as $value=>$text) {
			if ($value==$valorDefecto)
				$checked='checked="checked"';
			else
				$checked="";
			$html.="\n<label><input type=\"radio\" name=\"$name\" value=\"$value\" $checked> $text</label><br>";
		}
		return $html;
	}
}

function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
	else
		return $valorPorDefecto;
}

function EstaVacio($valor) {
	if (empty(trim($valor))) {
		return true;
	} else {
		return false;
	}
}