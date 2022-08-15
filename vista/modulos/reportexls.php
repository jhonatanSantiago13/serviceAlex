<?php

require_once "../../controlador/reporte.controlador.php";
// require_once "../../controlador/servicios.controlador.php";
require_once "../../modelo/servicios.modelo.php";
require_once "../../modelo/destinos.modelo.php";

$tipo = $_POST["tipoRespaldo"];

if($tipo == "destinos"){

	$reporte = ControladorReportes::ctrReporteDestinos($tipo);

}else{

	$fechadel = $_POST["fechadel"];
	$fechaal  = $_POST["fechaal"];

	if(!$fechadel){

	 $fechadel = null;

	}

	if(!$fechaal){

		$fechaal = null;

	}

	$reporte = ControladorReportes::ctrReporteServicios($fechadel, $fechaal);

}

?>