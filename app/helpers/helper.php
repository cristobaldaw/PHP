<?php

function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
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

function EstaVacio($valor) {
	if (empty(trim($valor))) {
		return true;
	} else {
		return false;
	}
}

function Paginacion($total_registros, $tamano_pagina, $total_paginas, $pagina, $ctr) {
	if ($total_registros > $tamano_pagina) { // Si el total de ofertas es menor que el tamaño de la página, no hay paginación ?>
		<div class="text-md-center">
			<ul class="pagination"><?php
				if ($pagina != 1) { // Si estoy en la primera página, no me deja retroceder más ?>
					<li><a href="<?=$ctr?>.php?pagina=1">&lt;&lt;</a></li>
					<li><a href="<?=$ctr?>.php?pagina=<?=($pagina-1)?>">&lt;</a></li> <?php
				} 
				if ($total_paginas > 1) {
					for ($i = 1 ; $i <= $total_paginas; $i++) {
						if ($pagina == $i) { ?>
							<li><a class="active" href=""><?=$pagina?></a></li>	<?php
						} else { ?>
							<li><a href="<?=$ctr?>.php?pagina=<?=$i?>"><?=$i?></a></li> <?php 
						}
					}
				}
				if ($total_paginas != $pagina) { // Si estoy en la última página, no me deja avanzar más ?>
					<li><a href="<?=$ctr?>.php?pagina=<?=($pagina+1)?>">&gt;</a></li>
					<li><a href="<?=$ctr?>.php?pagina=<?=$total_paginas?>">&gt;&gt;</a></li> <?php
				} ?>
			</ul>
		</div> <?php
	}
}
