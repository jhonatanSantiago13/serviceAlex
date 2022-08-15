<?php  

require_once "../../controlador/comprobantes.controlador.php";
require_once "../../controlador/servicios.controlador.php";
require_once "../../modelo/servicios.modelo.php";

$recibo = ContoladorComprobantes::ctrImprimirComprobante();

?>