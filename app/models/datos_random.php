<?php
function DatosRandom() {
	$conex = BD::getInstance();
	for ($i = 1; $i <= 50; $i++) {
		$sql = "insert into tbl_ofertas (descripcion, persona_contacto, telefono_contacto, email, provincia) values ('Descripción " . $i . "', 'Persona de contacto " . $i . "', 'Teléfono " . $i . "', 'Correo " . $i . "',  'Provincia ". $i . "')";
		$conex->Ejecutar($sql);
	}
}