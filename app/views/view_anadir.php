<div class="container">
	<div class="col-md-8 offset-md-2">		
		<div class="card card-outline-secondary card-formulario">
			<div class="card-block">
				<div class="text-md-center">
					<h2>Añadir nueva oferta</h2>
					<hr>
				</div>
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
					} ?>
					<div class="form-group row">
						<label for="descripcion" class="col-md-4 col-form-label"><strong>Descripción</strong></label>
						<div class="col-md-8">
							<textarea class="form-control" rows="3" name="descripcion"><?=ValorPost('descripcion')?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="persona_contacto" class="col-md-4 col-form-label"><strong>Persona de contacto</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="persona_contacto" value="<?=ValorPost('persona_contacto')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="telefono_contacto" class="col-md-4 col-form-label"><strong>Teléfono de contacto</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="telefono_contacto" value="<?=ValorPost('telefono_contacto')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label"><strong>Correo electrónico</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="email" value="<?=ValorPost('email')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="direccion" class="col-md-4 col-form-label"><strong>Dirección</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="direccion" value="<?=ValorPost('direccion')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="poblacion" class="col-md-4 col-form-label"><strong>Población</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="poblacion" value="<?=ValorPost('poblacion')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="codigo_postal" class="col-md-4 col-form-label"><strong>Código postal</strong></label>
						<div class="col-md-4">
							<input class="form-control" type="text" name="codigo_postal" maxlength="5"  value="<?=ValorPost('codigo_postal')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="example-datetime-local-input" class="col-md-4 col-form-label"><strong>Provincia</strong></label>
						<div class="col-md-8">
							<?= CreaSelect('provincia', $listaprovincias, ValorPost('provincia')); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
						<div class="col-md-8">
							<?= CreaRadio("estado", $estados, ValorPost('estado')); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="fecha_comunicacion" class="col-md-4 col-form-label"><strong>Fecha de comunicación</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" placeholder="dd/mm/aaaa" name="fecha_comunicacion"  value="<?=ValorPost('fecha_comunicacion')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="psicologo_encargado" class="col-md-4 col-form-label"><strong>Psicólogo encargado</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="psicologo_encargado"  value="<?=ValorPost('psicologo_encargado')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="candidato_seleccionado" class="col-md-4 col-form-label"><strong>Candidato seleccionado</strong></label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="candidato_seleccionado"  value="<?=ValorPost('candidato_seleccionado')?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="otros_datos_candidato" class="col-md-4 col-form-label"><strong>Otros datos del candidato</strong></label>
						<div class="col-md-8">
							<textarea class="form-control" rows="3" name="otros_datos_candidato"><?=ValorPost('otros_datos_candidato')?></textarea>
						</div>
					</div>
					<ul class="list-inline float-md-right">
						<li class="list-inline-item"><button type="submit" class="btn btn-primary">Añadir</button></li>
						<li class="list-inline-item"><a href="?ctrl=ctrl_admin" class="btn btn-secondary">Cancelar</a></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>