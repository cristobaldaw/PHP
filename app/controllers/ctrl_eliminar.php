<?php
if ($_SESSION["tipo_usuario"] == "Administrador") {
	include MODEL_PATH."modelo.php";
	if (isset($_POST["conf_eliminar"])) {
		EliminaOferta($_GET["id"]);
		$accion = "eliminado";
		$ref_volver = "ctrl_admin";
		include VIEW_PATH."exito.php";
	} else {
		$datos = DatosUnaOferta($_GET["id"]);
		include VIEW_PATH."view_eliminar.php";
	}
} else {
	header("location: index.php");
}