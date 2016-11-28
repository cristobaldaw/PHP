<?php
include_once "class_bd.php";

/**
 * Tipos de usuario
 * @var array $tipos
 */
$tipos = array(
	"A" => "Administrador",
	"P" => "Psicólogo");

/**
 * Devuelve los datos de un usuario
 * @param string $dato Dato por el que se busca
 * @param string $campo Campo que se busca
 * @return array
 */
function DatosUsuario($dato, $campo) {
	$conex = BD::GetInstance();
	$conex->Consulta("select * from tbl_usuarios where $dato = '$campo'");
	$rs = $conex->LeeRegistro();
	return $rs;	
}

/**
 * Número total de usuarios existentes en la base de datos
 * @return int
 */
function TotalUsuarios() {
	$conex = BD::getInstance();
	$conex->Consulta("select count(*) as total from tbl_usuarios");
	$rs = $conex->LeeRegistro();
	return $rs["total"];
}

/**
 * Añade un usuario a la base de datos
 * @param string $datos Datos del usuario
 */
function AnadirUsuario($datos) {
	$conex = BD::GetInstance();
	$sql = "insert into tbl_usuarios (usuario, pass, tipo) values ('$datos[usuario]', '$datos[pass]', '$datos[tipo]')";
	$conex->Ejecutar($sql);
}

/**
 * Elimina un usuario de la base de datos
 * @param int $id ID del usuario
 */
function EliminaUsuario($id) {
	$conex = BD::GetInstance();
	$sql = "delete from tbl_usuarios where id = '$id'";
	$conex->Ejecutar($sql);
}

/**
 * Modifica los datos de un usuario de la base de datos
 * @param string $id ID del usuario
 * @param array $datos Datos del usuario
 */
function ModificaUsuario($id, $datos) {
	$conex = BD::GetInstance();
	$sql = "update tbl_usuarios set usuario = '$datos[usuario]', pass = '$datos[pass]', tipo = '$datos[tipo]' where id = '$id'";
	$conex->Ejecutar($sql);
}

/**
 * Lista de usuarios, teniendo en cuenta la paginación
 * @param int $inicio Inicio de la paginación
 * @param int $tamano_pagina Tamaño de la página
 * @return array
 */
function ListaUsuarios($inicio, $tamano_pagina) {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_usuarios limit $inicio, $tamano_pagina");
	$lista = [];
	while ($rs = $conex->LeeRegistro()) {
		$lista[] = $rs;
	}
	return $lista;
}

/**
* Modifica los datos de la sesión en caso de cambiar los datos del usuario que está logueado
* @param string $usuario Nuevo nombre de usuario
* @param string $tipo Nuevo tipo de usuario
*/
function ModificaSesion($usuario, $tipo) {
	$tipo = ($tipo == "A") ? "administrador" : "psicólogo";
	$_SESSION["usuario"] = $usuario;
	$_SESSION["tipo_usuario"] = $tipo;
}

/**
 * Nos dice si las dos contraseñas coinciden
 * @param string $pass1 Contraseña 1
 * @param string $pass2 Contraseña 2
 * @return boolean
 */
function ConfirmPass($pass1, $pass2) {
	return ($pass1 == $pass2);
}

/**
 * Nos dice si el usuario logueado es de tipo administrador
 * @return boolean
 */
function EsAdmin() {
	return (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "administrador");
}

/**
 * Nos dice si el usuario logueado es de tipo psicólogo
 * @return boolean
 */
function EsPsico() {
	return (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "psicólogo");
}

/**
 * Nos dice si el usuario está logueado
 * @return boolean
 */
function EstaDentro() {
	return (EsAdmin() || EsPsico());
}