<?php
include "bd_singleton.php";

function InsertaOferta($descripcion, $persona_contacto, $telefono_contacto, $email, $direccion, $poblacion, $codigo_postal, $provincia, $estado, $fecha_comunicacion, $psicologo_encargado, $candidato_seleccionado, $otros_datos_candidato) {
	$conex = BD::getInstance();
	$sql = "insert into tbl_ofertas (descripcion, persona_contacto, telefono_contacto, email, direccion, poblacion, codigo_postal, provincia, estado, fecha_comunicacion, psicologo_encargado, candidato_seleccionado, otros_datos_candidato) values ('$descripcion', '$persona_contacto', '$telefono_contacto', '$email', '$direccion', '$poblacion', '$codigo_postal', '$provincia', '$estado', '$fecha_comunicacion', '$psicologo_encargado', '$candidato_seleccionado', '$otros_datos_candidato')";
	$conex->Ejecutar($sql);
}

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
 		array_push($errores, array("bool" => true, "error" => "Introduzca un número de teléfono válido."));
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

function EscribeErrores() {
	$errores = Errores();
	if (!empty($errores)) { ?>
		<div class="alert alert-danger">
			<ul> <?php
				foreach ($errores as $error) { ?>
					<li><?=$error["error"]?></li> <?php
				} ?>
			</ul>
		</div> <?php
	}
}

function SelectProvincias() {
	$conex = BD::getInstance();
	$conex->Consulta("select * from tbl_provincias order by nombre");
	while ($reg = $conex->LeeRegistro()) {
		$provincias[] = $reg;
	}
	foreach ($provincias as $provincia) {
		if ($_POST["provincia"] == $provincia["nombre"]) { ?> <!-- Si coincide con la provincia que se ha enviado en el post, se añade la propiedad selected -->
			<option value="<?=$provincia['nombre']?>" selected="selected"><?=$provincia['nombre']?></option> <?php
		} else { ?>
			<option value="<?=$provincia['nombre']?>"><?=$provincia['nombre']?></option> <?php
		}
	}
}

function RadioEstado() {
	$values = array(
		array("P", "Pendiente de iniciar selección"),
		array("R", "Realizando selección"),
		array("S", "Seleccionando candidato"),
		array("C", "Cancelada"));
	foreach ($values as $value) {
		if (isset($_POST["estado"]) && $_POST["estado"] == $value[0]) { ?>
			<label class="form-check-label">
				<input type="radio" name="estado" value="<?=$value[0]?>" checked="checked">
				<?=$value[1]?>
			</label><br> <?php
		} else { ?>
			<label class="form-check-label">
				<input type="radio" name="estado" value="<?=$value[0]?>">
				 <?=$value[1]?>
			</label><br> <?php
		}
	}
}

function EstaVacio($valor) {
	if (empty(trim($valor))) {
		return true;
	} else {
		return false;
	}
}

function ValorPost($nombreCampo) {
	if (isset($_POST[$nombreCampo])) {
		return $_POST[$nombreCampo];
	}
}