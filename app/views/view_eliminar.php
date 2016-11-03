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
			<h1 class="text-md-center">Eliminar oferta</h1>
			<hr>
			<div class="card card-outline-secondary card-formulario">
				<div class="card-block text-md-center">
					<h2>¿Desea eliminar esta oferta?</h2><br>
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
							<strong>Otros datos del candidato: </strong><?=$dato['otros_datos_candidato']?><br><br> <?php
						} ?>
					<form method="post" action="../controllers/ctr_eliminar.php">
						<button type="button" class="btn btn-outline-secondary" onclick="window.history.go(-1)">Cancelar</button>
						<button type="submit" class="btn btn-outline-primary" name="eliminar2">Eliminar</button>
						<input type="hidden" name="id" value="<?=$_POST['id']?>"> <!-- Aquí recibo el campo oculto de la vista de administrador y lo vuelvo a mandar al controlador de eliminar -->
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>