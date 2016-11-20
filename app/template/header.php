<nav class="navbar navbar-dark" id="header">
	<a class="navbar-brand" href="?ctrl=ctrl_login">JobYesterday</a>
		<?php
		if (isset($_SESSION['tipo_usuario'])) { ?>
			<span class="navbar-text float-md-right text-muted">
				<strong>Usuario:</strong> <?=$_SESSION["usuario"]?> | 
				<strong>Tipo de usuario:</strong> <?=ucfirst($_SESSION["tipo_usuario"])?> |
				Sesión iniciada a las <?=$_SESSION["hora"]?> |
				<a href="" data-toggle="modal" data-target="#logout" title="Cerrar sesión"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
			</span> <?php
		} ?>
</nav>

<!-- Modal cerrar sesión -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-md-center">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">¿Está seguro de que desea cerrar sesión?</h4>
			</div>
			<div class="modal-body">
				<a href="?ctrl=logout" class="btn btn-primary">Cerrar sesión</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>