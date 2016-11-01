<?php
include_once "bd_singleton.php";

function EliminaOferta($id) {
	$conex = BD::getInstance();
	$sql = "delete from tbl_ofertas where id = '$id'";
	$conex->Ejecutar($sql);
}