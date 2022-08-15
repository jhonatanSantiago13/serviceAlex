<?php
//ob_start();
require_once "../../controlador/respaldo.controlador.php";
require_once "../../controlador/servicios.controlador.php";
require_once "../../controlador/usuarios.controlador.php";
require_once "../../controlador/destinos.controlador.php";

require_once "../../modelo/servicios.modelo.php";
require_once "../../modelo/usuarios.modelo.php";
require_once "../../modelo/destinos.modelo.php";

$respaldo = ControladorRespaldo::ctrCrearRespaldo();

// echo $respaldo;
//ob_end_flush();
?>