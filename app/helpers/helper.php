<?php

/**
 * Devuelve el valor del post si hay, si no devuelve el valor por defecto
 * @param string $nombreCampo Nombre del campo
 * @param string $valorPorDefecto Valor por defecto
 * @return string
 */
function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ($_POST[$nombreCampo] ))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}
 /**
  * Devuelve el valor del get si hay, si no devuelve el valor por defecto
  * @param string $nombreCampo Nombre del campo
  * @param string $valorPorDefecto Valor por defecto
  * @return string
  */
function ValorGet($nombreCampo, $valorPorDefecto = '') {
	if (isset($_GET[$nombreCampo]))
		return $_GET[$nombreCampo];
	else
		return $valorPorDefecto;
}

/**
 * Crea un select en HTML
 * @param string $name Name del select
 * @param array $opciones Opciones del select
 * @param string $valorDefecto Valor por defecto del select
 * @param bool $seleccione Si es true, la primera opción será nula
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto = '', $seleccione = false)
{
	$html="\n".'<select name="'.$name.'" class="custom-select">';
        if ($seleccione)
			$html.= "\n\t<option value=\"\">- Seleccione -</option>";
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

/**
 * Crea un grupo de radiobutton en HTML
 * @param string $name Name del radiobutton
 * @param array $opciones Opciones del radiobutton
 * @param string $valorDefecto Valor por defecto del radiobutton
 * @return string
 */
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
	}
	return $html;
}

/**
 * Paginación
 * @param int $total_registros Total de registros a paginar
 * @param int $tamano_pagina Tamaño total de la página
 * @param int $total_paginas Total de páginas
 * @param int $page Página actual
 * @param string $ctrl Controlador actual
 */
function Paginacion($total_registros, $tamano_pagina, $total_paginas, $page, $ctrl='') {
	$url = (isset($_SESSION["url_buscar"])) ? $_SESSION["url_buscar"] : "?ctrl=$ctrl";
	if ($page > $total_paginas && $total_registros > 0) { // Si introduzco una página mayor que el total de páginas, voy a la última página
		header("location: $url&page=$total_paginas");
	}
	if ($total_registros > $tamano_pagina) { // Si el total de registros es menor que el tamaño de la página, no hay paginación ?>
		<div class="text-md-center">
			<ul class="pagination"> <?php
				if ($page != 1) { // Si estoy en la primera página, no me deja retroceder más ?>
					<li><a href="<?=$url?>&page=1">&lt;&lt;</a></li>
					<li><a href="<?=$url?>&page=<?=($page-1)?>">&lt;</a></li> <?php 
				} 
				if ($total_paginas > 1) {
					for ($i = 1 ; $i <= $total_paginas; $i++) {
						if ($page == $i) { ?>
							<li><a class="active" href=""><?=$page?></a></li>	<?php
						} else { ?>
							<li><a href="<?=$url?>&page=<?=$i?>"><?=$i?></a></li> <?php 
						}
					}
				}
				if ($total_paginas != $page) { // Si estoy en la última página, no me deja avanzar más ?>
					<li><a href="<?=$url?>&page=<?=($page+1)?>">&gt;</a></li>
					<li><a href="<?=$url?>&page=<?=$total_paginas?>">&gt;&gt;</a></li> <?php 
				} ?>
			</ul>
		</div> <?php
	}
}

/**
 * Almacena la referencia de la página a la que debo volver en caso de cancelar
 * @return string
 */
function RefCancelar() {
	$ctrl = (isset($_SESSION["url_buscar"])) ? $_SESSION["url_buscar"] : "?ctrl=ctrl_inicio";
	$page = (isset($_SESSION["page"]) && $_SESSION["page"] != 1) ? "&page=" . $_SESSION["page"] : "";
	return $ctrl . $page;
}