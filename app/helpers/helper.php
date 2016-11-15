<?php

function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ($_POST[$nombreCampo] ))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}

function ValorGet($nombreCampo, $valorPorDefecto = '') {
	if (isset($_GET[$nombreCampo]))
		return $_GET[$nombreCampo];
	else
		return $valorPorDefecto;
}

function CreaSelect($name, $opciones, $valorDefecto = '')
{
	$html="\n".'<select name="'.$name.'" class="custom-select">';
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

function Paginacion($total_registros, $tamano_pagina, $total_paginas, $page, $ctrl) {
	$url = "?ctrl=$ctrl";
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

function PaginacionBusqueda($total_registros, $tamano_pagina, $total_paginas, $page, $ctrl, $campos) {
	$url = "?ctrl=$ctrl&criterio1=$campos[criterio1]&descripcion=$campos[descripcion]&criterio2=$campos[criterio2]&fecha_creacion=$campos[fecha_creacion]&criterio3=$campos[criterio3]&persona_contacto=$campos[persona_contacto]";
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