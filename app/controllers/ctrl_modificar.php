<?php
include MODEL_PATH."model_usuarios.php";
if (EsAdmin() || EsPsico()) {
	include HELP_PATH."filtrados.php";
	include MODEL_PATH."model_ofertas.php";
	include MODEL_PATH."model_provincias.php";
	include HELP_PATH."helper.php";
	$datos = DatosUnaOferta($_GET["id"]);
	$listaprovincias = ListaProvincias();
	$cancelar = RefCancelar();
	$accion = "modificado";
	$view = (EsAdmin()) ? "view_mod_admin.php" : "view_mod_psico.php";
	if (!$_POST) {
		include VIEW_PATH.$view;
	} else {
		if (EsAdmin()) {
			$errores = FiltradoOfertas();
			if (!empty($errores)) {
				include VIEW_PATH."view_mod_admin.php";
			} else {
				ModificaOfertaAdmin($_GET['id'], $_POST);
				include VIEW_PATH."exito.php";
			}
		}
		else {
			ModificaOfertaPsico($_GET["id"], $_POST);
			include VIEW_PATH."exito.php";
		}
	}
} else {
	header("location: ?ctrl=ctrl_login");
}