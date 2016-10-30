<?php
$descripcion = $_POST["descripcion"];
$persona_contacto = $_POST["persona_contacto"];
$telefono_contacto = $_POST["telefono_contacto"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$poblacion = $_POST["poblacion"];
$codigo_postal = $_POST["codigo_postal"];
$provincia = $_POST["provincia"];
$estado = $_POST["estado"];
$fecha_comunicacion = explode("/", $_POST["fecha_comunicacion"]);
$fecha_comunicacion = strtotime($fecha_comunicacion[2] . "/" . $fecha_comunicacion[1] . "/" . $fecha_comunicacion[0]);
$fecha_comunicacion = date('Y-m-d', $fecha_comunicacion);
$psicologo_encargado = $_POST["psicologo_encargado"];
$candidato_seleccionado = $_POST["candidato_seleccionado"];
$otros_datos_candidato = $_POST["otros_datos_candidato"];