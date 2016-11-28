<div class="container">
	<div class="col-md-8 offset-md-2">		
		<div class="card card-block">
			<h2 class="card-title text-md-center">Modificar oferta</h2>
			<hr>
			<form method="post">
				<?php
				if ($errores) { ?>
					<div class="alert alert-danger">
						<ul> <?php
							foreach ($errores as $error) { ?>
								<li><?=$error?></li> <?php
							} ?>
						</ul>
					</div> <?php
				} ?>
				<div class="form-group row">
					<label for="descripcion" class="col-md-4 col-form-label"><strong>Descripción</strong></label>
					<div class="col-md-8">
						<textarea class="form-control" rows="3" name="descripcion" maxlength="200"><?=ValorPost('descripcion', $datos['descripcion'])?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="persona_contacto" class="col-md-4 col-form-label"><strong>Persona de contacto</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="persona_contacto" maxlength="40" value="<?=ValorPost('persona_contacto', $datos['persona_contacto'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="telefono_contacto" class="col-md-4 col-form-label"><strong>Teléfono de contacto</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="telefono_contacto" maxlength="13" value="<?=ValorPost('telefono_contacto', $datos['telefono_contacto'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label"><strong>Correo electrónico</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="email" maxlength="40" value="<?=ValorPost('email', $datos['email'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="direccion" class="col-md-4 col-form-label"><strong>Dirección</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="direccion" maxlength="100" value="<?=ValorPost('direccion', $datos['direccion'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="poblacion" class="col-md-4 col-form-label"><strong>Población</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="poblacion" maxlength="30" value="<?=ValorPost('poblacion', $datos['poblacion'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="codigo_postal" class="col-md-4 col-form-label"><strong>Código postal</strong></label>
					<div class="col-md-4">
						<input class="form-control" type="text" name="codigo_postal" maxlength="5"  value="<?=ValorPost('codigo_postal', $datos['codigo_postal'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-datetime-local-input" class="col-md-4 col-form-label"><strong>Provincia</strong></label>
					<div class="col-md-8">
						<?= CreaSelect("provincia", $lista_provincias, $datos["provincia"], $seleccione = true); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
					<div class="col-md-8">
						<?= CreaRadio("estado", $estados, ValorPost('estado', $datos["estado"])); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="fecha_comunicacion" class="col-md-4 col-form-label"><strong>Fecha de comunicación</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" placeholder="dd/mm/aaaa" name="fecha_comunicacion" maxlength="10" value="<?=ValorPost('fecha_comunicacion', $datos['fecha_comunicacion'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="psicologo_encargado" class="col-md-4 col-form-label"><strong>Psicólogo encargado</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="psicologo_encargado" maxlength="40" value="<?=ValorPost('psicologo_encargado', $datos['psicologo_encargado'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="candidato_seleccionado" class="col-md-4 col-form-label"><strong>Candidatos seleccionado</strong></label>
					<div class="col-md-8">
						<input class="form-control" type="text" name="candidato_seleccionado" maxlength="40" value="<?=ValorPost('candidato_seleccionado', $datos['candidato_seleccionado'])?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="otros_datos_candidato" class="col-md-4 col-form-label"><strong>Otros datos del candidatos</strong></label>
					<div class="col-md-8">
						<textarea class="form-control" rows="3" name="otros_datos_candidato" maxlength="200"><?=ValorPost('otros_datos_candidato', $datos['otros_datos_candidato'])?></textarea>
					</div>
				</div>
				<div class="text-md-right">
					<button type="submit" class="btn btn-primary">Modificar</button>
					<a href="<?=$cancelar?>" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>