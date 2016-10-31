<?php
include "../models/mdl_modificar.php";
$datos = DatosUnaOferta($_POST["id"]);
$listaprovincias = ListaProvincias(); 
include "../views/view_modificar.php";
