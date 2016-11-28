<?php

/**
 * Filtra los errores a la hora de añadir/modificar ofertas
 * @return array
 */
function FiltradoOfertas() {
	$errores = array();
	if (EstaVacio($_POST["descripcion"])) {
		$errores[] = "Introduzca una descripción.";
	}
 	if (EstaVacio($_POST["persona_contacto"])) {
 		$errores[] = "Introduzca una persona de contacto.";
 	}

 	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
 		$errores[] = "Introduzca una dirección de correo válida.";
 	}
 	
 	if (is_numeric(trim($_POST["telefono_contacto"]))) { // Acepta el símbolo "+" del prefijo y espacios en blanco
 		if (intval($_POST["telefono_contacto"]) < 0){
 			$errores[] = "Introduzca un teléfono de contacto válido.";
 		}
 	} else {
 		$errores[] = "Introduzca un teléfono de contacto válido.";
 	}

 	if (!EstaVacio($_POST["codigo_postal"])) { // Si el código postal no está vacío...
 		if (!preg_match("/^[0-9]+$/", $_POST["codigo_postal"]) || strlen($_POST["codigo_postal"]) != 5) { // Comprueba que solo contiene números y tiene 5 dígitos
 			$errores[] = "Introduzca un código postal válido.";
 		}
 	}
	if (!EstaVacio($_POST["fecha_comunicacion"])) { // Si la fecha de comunicación no está vacía
		$fecha = explode("/", $_POST["fecha_comunicacion"]);
		if (count($fecha) != 3 || !is_numeric($fecha[0]) || !is_numeric($fecha[1]) || !is_numeric($fecha[2])) { // Si después de hacer la separación no tiene 3 elementos, o uno de los tres elementos no es un número...
			$errores[] = "Introduzca un formato válido para la fecha de comunicación.";
		} else { // Si tiene 3 elementos...
			if (!checkdate($fecha[1], $fecha[0], $fecha[2])) { // Si esos 3 elementos no forman una fecha válida...
				$errores[] = "Introduzca una fecha válida en la fecha de comunicación.";
			} else { // Si forman una fecha válida...
				if (strtotime(date("m/d/y")) >= strtotime("$fecha[1]/$fecha[0]/$fecha[2]")) { // Se comprueba que la fecha de comunicación sea posterior a la de hoy
					$errores[] = "Introduzca una fecha de comunicación posterior a la actual.";
				}
			}
		}
	}
	return $errores;
}

/**
 * Filtra los errores a la hora de añadir/modificar usuarios
 * @param bool $modificar Indica si se está modificando o no
 * @return array
 */
function FiltradoUsuarios($modificar = false) {
	if ($modificar) {
		$datos = DatosUsuario("id", $_GET['id']);
		if (DatosUsuario("usuario", $_POST["usuario"]) && $_POST["usuario"] != $datos["usuario"]) { // Hay error si existe el usuario, salvo que sea el que estoy modificando
			$errores[] = "El nombre de usuario ya existe.";
		}
	} else {
		if (DatosUsuario("usuario", $_POST["usuario"])) { // Si existe el usuario...
			$errores[] = "El nombre de usuario ya existe.";
		}
	}
	if (EstaVacio($_POST['usuario'])) {
		$errores[] = "Introduzca un nombre de usuario.";
	}
	if (EstaVacio($_POST["pass"]) || EstaVacio($_POST["conf_pass"])) {
		$errores[] = "Introduzca una contraseña.";
	}
	if (!EstaVacio($_POST["pass"]) && !EstaVacio($_POST["conf_pass"]) and !ConfirmPass($_POST["pass"], $_POST["conf_pass"])) {
		$errores[] = "Las contraseñas no coinciden.";
	}
	if (!isset($_POST["tipo"])) {
		$errores[] = "Introduzca un tipo de usuario.";
	}
	return $errores;
}

/**
 * Indica si un campo está vacío después de eliminar los espacios en blanco
 * @param string $valor
 * @return boolean
 */
function EstaVacio($valor) {
	return (empty(trim($valor))) ? true : false;
}