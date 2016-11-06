<?php
include MODEL_PATH."modelo.php";
$id = $_GET["id"];
$datos = DatosUnaOferta($id);
include VIEW_PATH."view_informacion.php";