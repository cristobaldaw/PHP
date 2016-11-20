<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin()) {
	include HELP_PATH."helper.php";
	include HELP_PATH."filtrados.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	$listaprovincias = ListaProvincias();
	$cancelar = RefCancelar();
	
	if (!$_POST) {
		include VIEW_PATH."view_anadir.php";
	} else {
		$errores = FiltradoOfertas();
		if (!empty($errores)) {
			include VIEW_PATH."view_anadir.php";
		} else {
			InsertaOferta($_POST);
			$accion = "añadido";
			include VIEW_PATH."exito.php";
		}
	}
} else {
	header("location: ?ctrl=ctrl_login");
}