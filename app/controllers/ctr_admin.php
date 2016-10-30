<?php
include "../models/mdl_admin.php";
include "../models/funciones_generales.php";
if (!$_POST) {
	include "../views/view_admin.php";
}
if (isset($_POST["informacion"])) {
	include "../views/view_informacion.php";
}
if (isset($_POST["eliminar"])) {
	include "../views/view_eliminar.php";
}
if (isset($_POST["eliminar2"])) { // Este es el botón de confirmar el borrado
	EliminaOferta($_POST["id"]);
	include "../views/view_admin.php";
}