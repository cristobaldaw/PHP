<?php
include_once "bd_singleton.php";

function InsertaOferta($campos) {
	$conex = BD::getInstance();
	$sql = "insert into tbl_ofertas (descripcion, persona_contacto, telefono_contacto, email, direccion, poblacion, codigo_postal, provincia, estado, fecha_comunicacion, psicologo_encargado, candidato_seleccionado, otros_datos_candidato) values ('$campos[descripcion]', '$campos[persona_contacto]', '$campos[telefono_contacto]', '$campos[email]', '$campos[direccion]', '$campos[poblacion]', '$campos[codigo_postal]', '$campos[provincia]', '$campos[estado]', STR_TO_DATE('$campos[fecha_comunicacion]', '%d/%m/%Y'), '$campos[psicologo_encargado]', '$campos[candidato_seleccionado]', '$campos[otros_datos_candidato]')";
	$conex->Ejecutar($sql);
}

function EstaVacio($valor) {
	if (empty(trim($valor))) {
		return true;
	} else {
		return false;
	}
}

function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
	else
		return $valorPorDefecto;
}

function CreaSelect($name, $opciones, $valorDefecto = '')
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