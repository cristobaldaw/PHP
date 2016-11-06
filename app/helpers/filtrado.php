<?php
function Errores() {
	$errores = array();
	if (isset($_POST["descripcion"]) && EstaVacio($_POST["descripcion"])) {
		array_push($errores, array("bool" => true, "error" => "Introduzca una descripción.")); // Se añade a la última posición un valor booleano y el texto del error
	}

 	if (isset($_POST["persona_contacto"]) && EstaVacio($_POST["persona_contacto"])) {
 		array_push($errores, array("bool" => true, "error" => "Introduzca una persona de contacto."));
 	}

 	if (isset($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
 		array_push($errores, array("bool" => true, "error" => "Introduzca una dirección de correo válida."));
 	}

 	if (isset($_POST["telefono_contacto"]) && !is_numeric(str_replace(" ", "", $_POST["telefono_contacto"]))) { // El número de teléfono acepta el simbolo "+" del prefijo y espacios en blanco
 		array_push($errores, array("bool" => true, "error" => "Introduzca un teléfono de contacto válido."));
 	}

 	if (isset($_POST["codigo_postal"]) && !EstaVacio($_POST["codigo_postal"])) { // Si el código postal no está vacío...
 		if (!filter_var($_POST["codigo_postal"], FILTER_VALIDATE_INT) || strlen($_POST["codigo_postal"]) != 5) { // Comprueba que es un entero de 5 dígitos
 			array_push($errores, array("bool" => true, "error" => "Introduzca un código postal válido."));
 		}
 	}

	if (isset($_POST["fecha_comunicacion"]) && !EstaVacio($_POST["fecha_comunicacion"])) { // Si la fecha de comunicación no está vacía
		$fecha = explode("/", $_POST["fecha_comunicacion"]);
		if (count($fecha) != 3 || !is_numeric($fecha[0]) || !is_numeric($fecha[1]) || !is_numeric($fecha[2])) { // Si después de hacer la separación no tiene 3 elementos, o uno de los tres elementos no es un número...
			array_push($errores, array("bool" => true, "error" => "Introduzca un formato válido en la fecha de comunicación."));
		} else { // Si tiene 3 elementos...
			$day = $fecha[0];
			$month = $fecha[1];
			$year = $fecha[2];
			if (!checkdate($month, $day, $year)) { // Si esos 3 elementos no forman una fecha válida...
				array_push($errores, array("bool" => true, "error" => "Introduzca una fecha válida en la fecha de comunicación."));
			} else { // Si forman una fecha válida...
				if (strtotime(date("m/d/y")) >= strtotime("$fecha[1]/$fecha[0]/$fecha[2]")) { // Se comprueba que la fecha de comunicación sea posterior a la de hoy
					array_push($errores, array("bool" => true, "error" => "Introduzca una fecha de comunicación posterior a la actual."));
				}
			}
		}
	}
	return $errores;
}