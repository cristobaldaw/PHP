<div class="container">
	<div class="col-md-8 offset-md-2">
		<div class="card card-block text-md-center">
			<h2 class="card-title">Información completa sobre la oferta</h2>
			<hr>
			<?php
			foreach ($datos as $dato) { ?>
				<p><strong>Descripción: </strong><?=$dato['descripcion']?></p>
				<p><strong>Persona de contacto: </strong><?=$dato['persona_contacto']?></p>
				<p><strong>Teléfono de contacto: </strong><?=$dato['telefono_contacto']?></p>
				<p><strong>Correo electrónico: </strong><?=$dato['email']?></p>
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
				<button type="button" class="btn btn-primary" onclick="window.history.go(-1)">Aceptar</button> <?php
			} ?>
		</div>
	</div>
</div>