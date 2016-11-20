<div class="container">
	<div class="jumbotron jumbotron text-md-center jumbotron-gray">
		<h1 class="display-3">Panel de <?=$_SESSION["tipo_usuario"]?></h1>
		<hr class="hr_white">
		 <?php
		if (EsAdmin()) { ?>
			<a href="?ctrl=ctrl_anadir" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir nueva oferta</a>
			<a href="?ctrl=ctrl_usuarios" class="btn btn-secondary"><i class="fa fa-user" aria-hidden="true"></i> Gestión de usuarios</a>
		<?php } ?>
		<a href="?ctrl=ctrl_buscar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
	</div>
	<div class="row">
		<div class="col-md-8">
			<form method="post">
				<label for="orderby">Ordenar por:</label>
				<?=CreaSelect("orderby", $orderby, $_SESSION["orderby"])?>
				<?=CreaSelect("orden", $orden, $_SESSION["orden"])?>
				<button type="submit" class="btn btn-primary">Ordenar</button>
			</form>
		</div>
		<div class="col-md-4 text-md-right">
			<form method="post">
				<label for="tamano_pagina">Nº de ofertas por página:</label>
				<?=CreaSelect("tamano_pagina", $tamano_pagina, $_SESSION["tamano_pagina"])?>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</div> <?php
		if (empty($lista)) { ?>
			<div class="card encabezado_oferta text-md-center">
				<h1 class="card-title">No hay ofertas para mostrar</h1>
				<a href="?ctrl=ctrl_anadir" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Añadir nueva oferta</a></div>
			</div> <?php
		} else {
			foreach ($lista as $oferta) { ?>
				<div class="card card_listaofertas">
					<div class="encabezado_listaofertas">
						<h3><?=$oferta["descripcion"]?><small> (<?=TextoEstado($oferta["estado"])?>)</small></h3>
					</div>
					<div class="card-block">
						<table border="0" class="table table-hover borderless">
						<div class="datos_ofertas">
							<tr>
								<td><strong>Persona de contacto:</strong> <?=$oferta["persona_contacto"]?></td>
								<td><strong>Correo electrónico:</strong> <?=$oferta["email"]?></td>
								<td><strong>Provincia:</strong> <?=NombreProvincia($oferta["provincia"])?></td>
							</tr>
							<tr>
								<td><strong>Teléfono de contacto:</strong> <?=$oferta["telefono_contacto"]?></td>
								<td><strong>Psicólogo encargado:</strong> <?=$oferta["psicologo_encargado"]?></td>
								<td><strong>Población:</strong> <?=$oferta["poblacion"]?></td>
							</tr>
						</div>
						</table>
						<hr class="hr_black">
						<a href="?ctrl=ctrl_informacion&id=<?=$oferta['id']?>" id="informacion"><i class="fa fa-info" aria-hidden="true"></i> Información</a> | 
						<a href="?ctrl=ctrl_modificar&id=<?=$oferta['id']?>" id="modificar"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</a><?php
						if (EsAdmin()) { ?>
							| <a href="?ctrl=ctrl_eliminar&id=<?=$oferta['id']?>" id="eliminar"><i class="fa fa-times" aria-hidden="true"></i> Eliminar</a> <?php
						} ?>
						<p id="hacexdias" class="card-blockquote"><?=HaceXDias($oferta["fecha_creacion"])?></p>
					</div>
				</div> <?php
			}
		} ?>
	<?= Paginacion($total_ofertas, $_SESSION["tamano_pagina"], $total_paginas, $_SESSION["page"], "ctrl_inicio"); ?>
</div>