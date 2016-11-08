<nav class="navbar navbar-dark bg-inverse">
	<a class="navbar-brand" href="index.php">JobYesterday</a>
		<?php
		if (isset($_SESSION['tipo_usuario'])) { ?>
			<span class="navbar-text float-md-right text-muted">
				<strong>Usuario:</strong> <?=$_SESSION["usuario"]?> | 
				<strong>Tipo de usuario:</strong> <?=$_SESSION["tipo_usuario"]?> |
				Sesión iniciada a las <?=$_SESSION["hora"]?> |
				<a href="?ctrl=logout"><i class="fa fa-sign-out fa-lg" aria-hidden="true" title="Cerrar sesión"></i></a>
			</span> <?php
		} ?>
</nav>