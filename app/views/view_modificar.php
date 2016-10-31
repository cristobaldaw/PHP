<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
	<title>Añadir oferta</title>
</head>
<body>
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-md-center">Añadir una nueva oferta</h1>
			<hr>		
			<div class="card card-outline-secondary" id="card-formulario">
				<div class="card-block">
					<form method="post">
						<?php //EscribeErrores();
						foreach ($datos as $dato) { ?>
							<div class="form-group row">
								<label for="descripcion" class="col-md-4 col-form-label"><strong>Descripción</strong></label>
								<div class="col-md-8">
									<textarea class="form-control" rows="3" name="descripcion"><?=$dato["descripcion"]?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="persona_contacto" class="col-md-4 col-form-label"><strong>Persona de contacto</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="persona_contacto" value="<?=$dato['persona_contacto']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="telefono_contacto" class="col-md-4 col-form-label"><strong>Teléfono de contacto</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="telefono_contacto" value="<?=$dato['telefono_contacto']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label"><strong>Correo electrónico</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="email" value="<?=$dato['email']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="direccion" class="col-md-4 col-form-label"><strong>Dirección</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="direccion" value="<?=$dato['direccion']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="poblacion" class="col-md-4 col-form-label"><strong>Población</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="poblacion" value="<?=$dato['poblacion']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="codigo_postal" class="col-md-4 col-form-label"><strong>Código postal</strong></label>
								<div class="col-md-4">
									<input class="form-control" type="text" name="codigo_postal" maxlength="5"  value="<?=$dato['codigo_postal']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-datetime-local-input" class="col-md-4 col-form-label"><strong>Provincia</strong></label>
								<div class="col-md-8">
									<?= CreaSelect('provincia', $listaprovincias, $dato['provincia']); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
								<div class="col-md-8">
									<?php RadioEstado(); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="fecha_comunicacion" class="col-md-4 col-form-label"><strong>Fecha de comunicación</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" placeholder="dd/mm/aaaa" name="fecha_comunicacion"  value="<?=$dato['fecha_comunicacion']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="psicologo_encargado" class="col-md-4 col-form-label"><strong>Psicólogo encargado</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="psicologo_encargado"  value="<?=$dato['psicologo_encargado']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="candidato_seleccionado" class="col-md-4 col-form-label"><strong>Candidato seleccionado</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="candidato_seleccionado"  value="<?=$dato['candidato_seleccionado']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="otros_datos_candidato" class="col-md-4 col-form-label"><strong>Otros datos del candidato</strong></label>
								<div class="col-md-8">
									<textarea class="form-control" rows="3" name="otros_datos_candidato"><?=$dato["otros_datos_candidato"]?></textarea>
								</div>
							</div> <?php
						} ?>
						<ul class="list-inline float-md-right">
							<li class="list-inline-item"><button type="button" class="btn btn-outline-secondary" onclick="location.href='../controllers/ctr_admin.php'">Cancelar</button></li>
							<li class="list-inline-item"><button type="submit" class="btn btn-outline-primary">Añadir</button></li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>