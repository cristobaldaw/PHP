<div class="container">
	<div class="col-md-8 offset-md-2">
		<div class="card card-block text-md-center">
			<h2 class="card-title">¿Desea eliminar esta oferta?</h2>
			<hr class="hr_black">
			<table class="table table-hover borderless">
				<tr>
					<td><strong>Descripción:</strong> <?=$datos["descripcion"]?></td>
				</tr>
				<tr>
					<td><strong>Persona de contacto:</strong> <?=$datos["persona_contacto"]?></td>
				</tr>
				<tr>
					<td><strong>Teléfono de contacto:</strong> <?=$datos['telefono_contacto']?></td>
				</tr>
				<tr>
					<td><strong>Teléfono de contacto:</strong> <?=$datos['telefono_contacto']?></td>
				</tr>
				<tr>
					<td><strong>Correo electrónico:</strong> <?=$datos['email']?></td>
				</tr>
				<tr>
					<td><strong>Dirección:</strong> <?=$datos['direccion']?></td>
				</tr>
				<tr>
					<td><strong>Población:</strong> <?=$datos['poblacion']?></td>
				</tr>
				<tr>
					<td><strong>Código postal:</strong> <?=$datos['codigo_postal']?></td>
				</tr>
				<tr>
					<td><strong>Provincia:</strong> <?=NombreProvincia($datos['provincia'])?></td>
				</tr>
				<tr>
					<td><strong>Estado:</strong> <?=TextoEstado($datos['estado'])?></td>
				</tr>
				<tr>
					<td><strong>Fecha de creación:</strong> <?=$datos['fecha_creacion']?></td>
				</tr>
				<tr>
					<td><strong>Fecha de comunicación:</strong> <?=$datos['fecha_comunicacion']?></td>
				</tr>
				<tr>
					<td><strong>Psicólogo encargado:</strong> <?=$datos['psicologo_encargado']?></td>
				</tr>
				<tr>
					<td><strong>Candidatos seleccionado:</strong> <?=$datos['candidato_seleccionado']?></td>
				</tr>
				<tr>
					<td><strong>Otros datoss del candidatos:</strong> <?=$datos['otros_datos_candidato']?></td>
				</tr>
			</table>
			<form method="post">
				<div class="text-md-right">
					<button type="submit" class="btn btn-primary" name="conf_eliminar">Eliminar</button>
					<a href="<?=$cancelar?>" class="btn btn-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>
