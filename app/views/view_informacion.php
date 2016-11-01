<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../assets/js/jquery.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-md-center">Información completa sobre la oferta</h1>
			<hr>
			<div class="card card-outline-secondary" id="card-formulario">
				<div class="card-block text-md-center">
						<?php
						foreach ($datos as $dato) { ?>
							<strong>Descripción: </strong><?=$dato['descripcion']?><br>
							<strong>Persona de contacto: </strong><?=$dato['persona_contacto']?><br>
							<strong>Teléfono de contacto: </strong><?=$dato['telefono_contacto']?><br>
							<strong>Correo electrónico: </strong><?=$dato['email']?><br>
							<strong>Dirección: </strong><?=$dato['direccion']?><br>
							<strong>Población: </strong><?=$dato['poblacion']?><br>
							<strong>Código postal: </strong><?=$dato['codigo_postal']?><br>
							<strong>Provincia: </strong><?=NombreProvincia($dato['provincia'])?><br>
							<strong>Estado: </strong><?=TextoEstado($dato['estado'])?><br>
							<strong>Fecha de creación: </strong><?=$dato['fecha_creacion']?><br>
							<strong>Fecha de comunicación: </strong><?=$dato['fecha_comunicacion']?><br>
							<strong>Psicólogo encargado: </strong><?=$dato['psicologo_encargado']?><br>
							<strong>Candidato seleccionado: </strong><?=$dato['candidato_seleccionado']?><br>
							<strong>Otros datos del candidato: </strong><?=$dato['otros_datos_candidato']?><br><br>
							<button type="button" class="btn btn-outline-primary" onclick="window.history.go(-1)">Aceptar</button> <?php
						} ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>