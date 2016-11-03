<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
	<title>Modificar oferta</title>
</head>
<body>
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-md-center">Modificar oferta</h1>
			<hr>		
			<div class="card card-outline-secondary card-formulario">
				<div class="card-block">
					<form method="post" action="../controllers/ctr_modificar.php">
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
								<label for="descripcion" class="col-md-4 col-form-label"><strong>Descripción</strong></label>
								<div class="col-md-8">
									<textarea class="form-control" rows="3" name="descripcion"><?=ValorPost('descripcion', $dato['descripcion'])?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="persona_contacto" class="col-md-4 col-form-label"><strong>Persona de contacto</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="persona_contacto" value="<?=ValorPost('persona_contacto', $dato['persona_contacto'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="telefono_contacto" class="col-md-4 col-form-label"><strong>Teléfono de contacto</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="telefono_contacto" value="<?=ValorPost('telefono_contacto', $dato['telefono_contacto'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label"><strong>Correo electrónico</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="email" value="<?=ValorPost('email', $dato['email'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="direccion" class="col-md-4 col-form-label"><strong>Dirección</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="direccion" value="<?=ValorPost('direccion', $dato['direccion'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="poblacion" class="col-md-4 col-form-label"><strong>Población</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="poblacion" value="<?=ValorPost('poblacion', $dato['poblacion'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="codigo_postal" class="col-md-4 col-form-label"><strong>Código postal</strong></label>
								<div class="col-md-4">
									<input class="form-control" type="text" name="codigo_postal" maxlength="5"  value="<?=ValorPost('codigo_postal', $dato['codigo_postal'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-datetime-local-input" class="col-md-4 col-form-label"><strong>Provincia</strong></label>
								<div class="col-md-8">
									<?= CreaSelect("provincia", $listaprovincias, $dato["provincia"]); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label"><strong>Estado</strong></label>
								<div class="col-md-8">
									<?= CreaRadio("estado", $estados, $dato["estado"]); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="fecha_comunicacion" class="col-md-4 col-form-label"><strong>Fecha de comunicación</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" placeholder="dd/mm/aaaa" name="fecha_comunicacion"  value="<?=ValorPost('fecha_comunicacion', $dato['fecha_comunicacion'])?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="psicologo_encargado" class="col-md-4 col-form-label"><strong>Psicólogo encargado</strong></label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="psicologo_encargado"  value="<?=ValorPost('psicologo_encargado', $dato['psicologo_encargado'])?>">
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
						<ul class="list-inline float-md-right">
							<li class="list-inline-item"><button type="button" class="btn btn-outline-secondary" onclick='location.href="../controllers/ctr_admin.php"''>Cancelar</button></li>
							<li class="list-inline-item"><button type="submit" name="modificar2" class="btn btn-outline-primary">Modificar</button></li>
						</ul>
						<input type="hidden" name="id" value="<?=$_POST['id']?>"> <!-- Aquí recibo el campo oculto de la vista de administrador y lo vuelvo a mandar al controlador de eliminar -->
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>