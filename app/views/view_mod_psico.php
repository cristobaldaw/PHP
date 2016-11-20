<div class="container">
	<div class="col-md-6">
		<div class="card card-block text-md-center">
			<h2 class="card-title">Información sobre la oferta</h2>
			<hr class="hr_black">
			<table class="table table-hover table-sm">
				<tr>
					<td><strong>Descripción: </strong><?=$datos['descripcion']?></td>
				</tr>
				<tr>
					<td><strong>Persona de contacto: </strong><?=$datos['persona_contacto']?></td>
				</tr>
				<tr>
					<td><strong>Teléfono de contacto: </strong><?=$datos['telefono_contacto']?></td>
				</tr>
				<tr>
					<td><strong>Correo electrónico: </strong><?=$datos['email']?></td>
				</tr>
				<tr>
					<td><strong>Correo electrónico: </strong><?=$datos['email']?></td>
				</tr>
				<tr>
					<td><strong>Dirección: </strong><?=$datos['direccion']?></td>
				</tr>
				<tr>
					<td><strong>Población: </strong><?=$datos['poblacion']?></td>
				</tr>
				<tr>
					<td><strong>Código postal: </strong><?=$datos['codigo_postal']?></td>
				</tr>
				<tr>
					<td><strong>Provincia: </strong><?=NombreProvincia($datos['provincia'])?></td>
				</tr>
				<tr>
					<td><strong>Fecha de creación: </strong><?=$datos['fecha_creacion']?></td>
				</tr>
				<tr>
					<td><strong>Fecha de comunicación: </strong><?=$datos['fecha_comunicacion']?></td>
				</tr>
				<tr>
					<td><strong>Psicólogo encargado: </strong><?=$datos['psicologo_encargado']?></td>
				</tr>
			</table>
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
								<li><?=$error?></li> <?php
							} ?>
						</ul>
					</div> <?php
				} ?>
				<div class="form-group row">
					<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
					<div class="col-md-8">
						<?= CreaRadio("estado", $estados, $datos["estado"]); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="candidato_seleccionado" class="col-md-4 col-form-label"><strong>Candidato seleccionado</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="candidato_seleccionado"  value="<?=ValorPost('candidato_seleccionado', $datos['candidato_seleccionado'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="otros_datos_candidato" class="col-md-4 col-form-label"><strong>Otros datos del candidato</strong></label>
					<div class="col-md-8">
						<textarea class="form-control" rows="3" name="otros_datos_candidato"><?=ValorPost('otros_datos_candidato', $datos['otros_datos_candidato'])?></textarea>
					</div>
				</div>
				<div class="text-md-right">
					<button type="submit" name="modificar2" class="btn btn-primary">Modificar</button>
					<a href="<?=$cancelar?>" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>