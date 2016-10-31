<?php
include "../models/bd_singleton.php";
include "../models/mdl_informacion.php";
$id = $_POST["id"];
$datos = DatosUnaOferta($id);
include "../views/view_informacion.php";