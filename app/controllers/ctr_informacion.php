<?php
include_once "../models/funciones.php";
$id = $_POST["id"];
$datos = DatosUnaOferta($id);
include "../views/view_informacion.php";