<?php

require_once "controlador/respaldo.controlador.php";
require_once "controlador/plantilla.controlador.php";
require_once "controlador/servicios.controlador.php";
require_once "controlador/destinos.controlador.php";
require_once "controlador/usuarios.controlador.php";


require_once "modelo/servicios.modelo.php";
require_once "modelo/destinos.modelo.php";
require_once "modelo/usuarios.modelo.php";

require_once "modelo/rutas.php";


/*=============================================
TRAER PLANTILLA DEL ADMIN
=============================================*/

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();