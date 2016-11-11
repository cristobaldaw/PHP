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
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<title>JobYesterday</title>
</head>
<body>
<?php
// Cuerpo del controlador frontal
session_start();
include TEMPLATE_PATH."header.php"; ?>
<div class="cuerpo"> <?php
	$ctrl=isset($_GET['ctrl']) ? $_GET['ctrl'] : 'ctrl_login';
	$file=CTRL_PATH.$ctrl.".php";
	if (file_exists($file)) {
	    include($file);
	} else {
	    include(VIEW_PATH.'error404.php');
	} ?>
</div>
</body>
</html>