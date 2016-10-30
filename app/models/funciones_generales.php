<?php
function TextoEstado($estado) {
	$texto = "";
	switch ($estado) {
		case "P":
			$texto = "Pendiente de iniciar selección";
			break;
		case "R":
			$texto = "Realizando selección";
			break;
		case "S":
			$texto = "Seleccionando candidato";
			break;
		case "C":
			$texto = "Cancelada";
			break;
	}
	return $texto;
}