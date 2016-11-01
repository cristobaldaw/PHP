<?php
include "../models/mdl_eliminar.php";
include_once "../models/funciones.php";
if (!isset($_POST["eliminar2"])) {
	$datos = DatosUnaOferta($_POST["id"]);
	include "../views/view_eliminar.php";
} else {
	EliminaOferta($_POST["id"]);
	include "../controllers/ctr_admin.php";
}