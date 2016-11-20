<?php
include_once "bd_singleton.php";

$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");

function DatosUsuario($campo, $busqueda) {
	$conex = BD::GetInstance();
	$conex->Consulta("select * from tbl_usuarios where $campo = '$busqueda'");
	while ($rs = $conex->LeeRegistro()) {
		$datos[] = $rs;
	}
	foreach ($datos as $dato) {
		$datos = $dato;
	}
	return $datos;
}

function TotalUsuarios() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_usuarios");
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	return $total["total"];
}

function ExisteUsuario($usuario) {
	$conex = BD::GetInstance();
	$conex->Consulta("select count(*) as total from tbl_usuarios where usuario = '$usuario'");
	while ($rs = $conex->LeeRegistro()) {
		$total = $rs;
	}
	if ($total["total"] > 0) {
		return true;
	} else {
 		return false;
	}
}

function AnadirUsuario($campos) {
	$conex = BD::GetInstance();
	$sql = "insert into tbl_usuarios (usuario, pass, tipo) values ('$campos[usuario]', '$campos[pass]', '$campos[tipo]')";
	$conex->Ejecutar($sql);
}

function EliminaUsuario($id) {
	$conex = BD::GetInstance();
	$sql = "delete from tbl_usuarios where id = '$id'";
	$conex->Ejecutar($sql);
}

function ModificaUsuario($id, $campos) {
	$conex = BD::GetInstance();
	$sql = "update tbl_usuarios set usuario = '$campos[usuario]', pass = '$campos[pass]', tipo = '$campos[tipo]' where id = '$id'";
	$conex->Ejecutar($sql);
}

function ListaUsuariosPaginacion($inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_usuarios limit $inicio, $tamano_pagina");
	while ($rs = $conex->LeeRegistro()) {
		$lista[] = $rs;
	}
	if (!empty($lista)) {
		return $lista;
	}
}

function TipoUsuario($tipo) {
	switch ($tipo) {
		case "A":
			return "Administrador";
			break;
		case "P":
			return "Psicólogo";
			break;
	}
}

function ConfirmPass($pass1, $pass2) {
	if ($pass1 == $pass2)
		return true;
	else
		return false;
}

function EsAdmin() {
	if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "administrador")
		return true;
	else
		return false;
}

function EsPsico() {
	if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "psicólogo")
		return true;
	else
		return false;
}