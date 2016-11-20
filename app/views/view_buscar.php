<div class="container">
	<div class="jumbotron jumbotron-gray">
		<div class="text-md-left">
			<a href="?ctrl=ctrl_inicio" class="btn btn-secondary btn_volver" title="Volver"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
		</div>
		<div class="text-md-center">
			<?php
			if (isset($error)) { ?>
				<div class="alert alert-danger col-md-6 offset-md-3">
					<ul>
						<li>Introduzca al menos un campo para buscar</li>
					</ul>
				</div> <?php
			} ?>
			<h1 class="display-3">Búsqueda</h1>
			<hr>
			<form method="get">
				<input type="hidden" name="ctrl" value="ctrl_buscar">
				<div class="row">
					<div class="col-md-4"><h3>Descripción:</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio1", $campos, ValorGet('criterio1')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="<?=ValorGet('descripcion')?>">
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><h3>Fecha de creación:</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio2", $campos, ValorGet('criterio2')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="fecha_creacion" placeholder="Fecha de creación (dd/mm/aaaa)" value="<?=ValorGet('fecha_creacion')?>">
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4"><h3>Persona de contacto</h3></div>
					<div class="col-md-4">
						<?= CreaSelect("criterio3", $campos, ValorGet('criterio3')) ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" name="persona_contacto" placeholder="Persona de contacto" value="<?=ValorGet('persona_contacto')?>">
						</div>
					</div>
				</div>
				<div class="row">
					<br><button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</form>
		</div>
	</div> <?php
			if (empty($resultados)) { ?>
				<div class="card encabezado_oferta text-md-center">
					<h1 class="card-title">No hay ofertas para mostrar</h1>
				</div> <?php
			} else {
				foreach ($resultados as $resultado) { ?>
					<div class="card card_listaofertas">
						<div class="encabezado_listaofertas">
							<h3><?=$resultado["descripcion"]?><small> (<?=TextoEstado($resultado["estado"])?>)</small></h3>
						</div>
						<div class="card-block">
							<table border="0" class="table table-hover borderless">
							<div class="datos_ofertas">
								<tr>
									<td><strong>Persona de contacto:</strong> <?=$resultado["persona_contacto"]?></td>
									<td><strong>Correo electrónico:</strong> <?=$resultado["email"]?></td>
									<td><strong>Provincia:</strong> <?=NombreProvincia($resultado["provincia"])?></td>
								</tr>
								<tr>
									<td><strong>Teléfono de contacto:</strong> <?=$resultado["telefono_contacto"]?></td>
									<td><strong>Psicólogo encargado:</strong> <?=$resultado["psicologo_encargado"]?></td>
									<td><strong>Población:</strong> <?=$resultado["poblacion"]?></td>
								</tr>
							</div>
							</table>
							<hr class="hr_black">
							<a href="?ctrl=ctrl_informacion&id=<?=$resultado['id']?>" id="informacion"><i class="fa fa-info" aria-hidden="true"></i> Información</a> | 
							<a href="?ctrl=<?=$mod?>&id=<?=$resultado['id']?>" id="modificar"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</a> <?php
							if (EsAdmin()) { ?>
								| <a href="?ctrl=ctrl_eliminar&id=<?=$resultado['id']?>" id="eliminar"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</a> <?php
							} ?>
							<p id="hacexdias" class="card-blockquote"><?=HaceXDias($resultado["fecha_creacion"])?></p>
						</div>
					</div> <?php
				}
			}
	if (!empty($resultados)) {
		Paginacion($total_resultados, $tamano_pagina, $total_paginas, $page);
	} ?>
</div>