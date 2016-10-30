<?php
include "../models/mdl_anadir.php";
if (!$_POST) {
	include "../views/view_anadir.php";
} else {
	$errores = Errores();
	if (in_array(true, $errores)) { // Si el array contiene algún valor true, es que hay algún error
		include "../views/view_anadir.php";
	} else {
		include "../models/variables_oferta.php";
		InsertaOferta($descripcion, $persona_contacto, $telefono_contacto, $email, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $fecha_comunicacion, $psicologo_encargado, $candidato_seleccionado, $otros_datos_candidato);
		include "../views/insertado_exito.php";
	}
}