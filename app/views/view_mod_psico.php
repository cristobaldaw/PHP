<div class="container">
	<div class="col-md-6">
		<div class="card card-block text-md-center">
			<h2 class="card-title">Información sobre la oferta</h2>
			<hr>
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
				<strong>Fecha de creación: </strong><?=$dato['fecha_creacion']?><br>
				<strong>Fecha de comunicación: </strong><?=$dato['fecha_comunicacion']?><br>
				<strong>Psicólogo encargado: </strong><?=$dato['psicologo_encargado']?><?php
			} ?>
		</div>
	</div>
	<div class="col-md-6">		
		<div class="card card-block">
			<h2 class="card-title text-md-center">Modificar oferta</h2>
			<hr>
			<form method="post">
				<?php
				if (!empty($errores)) { ?>
					<div class="alert alert-danger">
						<ul> <?php
							foreach ($errores as $error) { ?>
								<li><?=$error['error']?></li> <?php
							} ?>
						</ul>
					</div> <?php
				}
				foreach ($datos as $dato) { ?>
					<div class="form-group row">
						<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
						<div class="col-md-8">
							<?= CreaRadio("estado", $estados, $dato["estado"]); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="candidato_seleccionado" class="col-md-4 col-form-label"><strong>Candidato seleccionado</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="candidato_seleccionado"  value="<?=ValorPost('candidato_seleccionado', $dato['candidato_seleccionado'])?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="otros_datos_candidato" class="col-md-4 col-form-label"><strong>Otros datos del candidato</strong></label>
						<div class="col-md-8">
							<textarea class="form-control" rows="3" name="otros_datos_candidato"><?=ValorPost('otros_datos_candidato', $dato['otros_datos_candidato'])?></textarea>
						</div>
					</div> <?php
				} ?>
				<div class="text-md-right">
					<button type="submit" name="modificar2" class="btn btn-primary">Modificar</button>
					<a href="<?=$ref_volver1?>" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>