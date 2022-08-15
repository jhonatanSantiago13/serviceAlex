<?php

require_once "../controlador/servicios.controlador.php";
require_once "../modelo/servicios.modelo.php";

class AjaxInicio{

	/*=============================================
	TRAER ESTADISTICAS
	=============================================*/


	public function traerEstadisticasAjax(){

		$fechadel = "";
		$fechaal  = "";
		$tipo     = "";
		$metodo   = "funcion";

		$respuesta = ControladorServicios::ctrMostrarEstadisticas($fechadel, $fechaal, $tipo, $metodo);

		echo json_encode($respuesta);

	}

	/*=============================================
	FILTRAR ESTADISTICAS
	=============================================*/
	public $fechadel;
	public $fechaal;
	public $tipo;

	public function filtrarEstadisitcasAjax(){

		$fechadel = $this->fechadel;
		$fechaal  = $this->fechaal;
		$tipo     = $this->tipo;
		$metodo   = "filtrar";

		$respuesta2 = ControladorServicios::ctrMostrarEstadisticas($fechadel, $fechaal, $tipo, $metodo);

		echo json_encode($respuesta2);	


		
	}

}//en clase


/*=============================================
TRAER ESTADISTICAS
=============================================*/
if(isset($_POST["fun"])){

	$estadisticas = new AjaxInicio();
	$estadisticas -> traerEstadisticasAjax();

}

/*=============================================
FILTRAR ESTADISTICAS
=============================================*/

if(isset($_POST["fechadel"])){

	$filtrar = new AjaxInicio();
	$filtrar -> fechadel = $_POST["fechadel"];
	$filtrar -> fechaal = $_POST["fechaal"];
	$filtrar -> tipo = $_POST["tipo"];

	$filtrar -> filtrarEstadisitcasAjax();

}
