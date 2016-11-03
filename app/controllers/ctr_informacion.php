<?php
include_once "../models/modelo.php";
$id = $_POST["id"];
$datos = DatosUnaOferta($id);
include "../views/view_informacion.php";