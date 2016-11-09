<nav class="navbar navbar-dark bg-inverse">
	<a class="navbar-brand" href="index.php">JobYesterday</a>
		<?php
		if (isset($_SESSION['tipo_usuario'])) { ?>
			<span class="navbar-text float-md-right text-muted">
				<strong>Usuario:</strong> <?=$_SESSION["usuario"]?> | 
				<strong>Tipo de usuario:</strong> <?=$_SESSION["tipo_usuario"]?> |
				Sesión iniciada a las <?=$_SESSION["hora"]?> |
				<a href="" data-toggle="modal" data-target="#logout" title="Cerrar sesión"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
			</span> <?php
		} ?>
</nav>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-md-center">¿Estás seguro de que desea cerrar la sesión?</h4>
			</div>
			<div class="modal-footer">
				<a href="?ctrl=logout" class="btn btn-primary">Cerrar sesión</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>