<?php
// Definomos constantes que facilitan el trabajo
define('CTRL_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('HELP_PATH', __DIR__.'/helpers/');
define("TEMPLATE_PATH", __DIR__."/template/");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<title>JobYesterday</title>
	<script> // Necesario para colocar el footer al final de la página
		$(document).ready(function() {
			var docHeight = $(window).height();
			var footerHeight = $('#footer').height();
			var footerTop = $('#footer').position().top + footerHeight;
			if (footerTop < docHeight) {
				$('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
			}
		});
	</script>
</head>
<body>
<?php
// Cuerpo del controlador frontal
session_start();
include TEMPLATE_PATH."header.php"; ?>
<div class="cuerpo"> <?php
	$ctrl = isset($_GET["ctrl"]) ? $_GET["ctrl"] : "ctrl_login";
	$file = CTRL_PATH . $ctrl . ".php";
	if (file_exists($file)) {
	    include $file;
	} else {
	    include VIEW_PATH."error404.php";
	} ?>
</div>
<?php
if (EstaDentro()) { // Para que no se muestre el footer en el login
	include TEMPLATE_PATH."footer.php";
} ?>
</body>
</html>