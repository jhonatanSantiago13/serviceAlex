<?php

require_once "../controlador/destinos.controlador.php";
require_once "../modelo/destinos.modelo.php";

class AjaxDestinos{

	public $lugarOrigen;
	public $tipoViaje;
	public $estado;
	public $ciudad;
	public $cantidad;

	public $id_destino;

	/*=============================================
	GUARDAR DESTINO
	=============================================*/

	public function guardarDestinoAjax(){

		$datos = array("lugarOrigen" => $this->lugarOrigen,
					   "tipoViaje" => $this->tipoViaje,
					   "estado" => $this->estado,
					   "ciudad" => $this->ciudad,
					   "cantidad" => $this->cantidad);

		$respuesta = ControladorDestinos::ctrGuardarDestinos($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER DATOS DEL DESTINO
	=============================================*/

	public $id_ruta;

	public function traerRutaEditarAjax(){

	 	$item = "id";
	 	$valor = $this->id_ruta;
	 	$itemOrden = null;
	 	$orden = null;

		$respuesta = ControladorDestinos::ctrMostrarDestinos($item, $valor, $itemOrden, $orden);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTUALIZAR DESTINO
	=============================================*/

	public function actualizarRutaAjax(){

		$datos = array("idDestino" => $this->id_destino,
					   "lugarOrigen" => $this->lugarOrigen,
					   "tipoViaje" => $this->tipoViaje,
					   "estado" => $this->estado,
					   "ciudad" => $this->ciudad,
					   "cantidad" => $this->cantidad);

		$respuesta = ControladorDestinos::ctrActualizarDestino($datos);

		echo $respuesta;

	}

	/*=============================================
	ELIMINAR DESTINO
	=============================================*/

	public function eliminarRutaAjax(){

		$item = "id";
		$valor = $this->id_destino;

		$respuesta = ControladorDestinos::ctrEliminarDestino($item, $valor);

		echo $respuesta;

	}

	/*=============================================
	AUTOCOMPLETAR
	=============================================*/

	public $q;

	public function autocompletarRutaAjax(){

		$item = "ciudad_destino";
		$valor = $this->q;

		$respuesta = ControladorDestinos::ctrAutocompletarDestinos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	DATOS AUTOCOMPLETAR
	=============================================*/
	public function datosAutocompletarRutaAjax(){

		$item = "id";
		$valor = $this->id_destino;
		$itemOrden = null;
		$orden = null;

		$respuesta = ControladorDestinos::ctrMostrarDestinos($item, $valor, $itemOrden, $orden);

		echo json_encode($respuesta);

	}

}//end clase

/*=============================================
GUARDAR DESTINO
=============================================*/

if(isset($_POST["guardarRuta"])){

	$guardarRuta = new AjaxDestinos();
	$guardarRuta -> lugarOrigen = $_POST["lugarOrigen"];
	$guardarRuta -> tipoViaje = $_POST["tipoViaje"];
	$guardarRuta -> estado = $_POST["estado"];
	$guardarRuta -> ciudad = $_POST["ciudad"];
	$guardarRuta -> cantidad = $_POST["cantidad"];

	$guardarRuta -> guardarDestinoAjax();


}

/*=============================================
TRAER DATOS DEL DESTINO
=============================================*/

if(isset($_POST["traerRutas"])){

	$ruta = new AjaxDestinos();
	$ruta -> id_ruta = $_POST["id_ruta"];
	$ruta -> traerRutaEditarAjax();

}

/*=============================================
ACTUALIZAR DESTINO
=============================================*/

if(isset($_POST["actualizarDestino"])) {
	
	$actualizarDestino = new AjaxDestinos();
	$actualizarDestino -> id_destino = $_POST["id_destino"];
	$actualizarDestino -> lugarOrigen = $_POST["lugarOrigen"];
	$actualizarDestino -> tipoViaje = $_POST["tipoViaje"];
	$actualizarDestino -> estado = $_POST["estado"];
	$actualizarDestino -> ciudad = $_POST["ciudad"];
	$actualizarDestino -> cantidad = $_POST["cantidad"];
	$actualizarDestino -> actualizarRutaAjax();

}

/*=============================================
ELIMINAR DESTINO
=============================================*/

if(isset($_POST["eliminarDestino"])){

	$eliminarDestino = new AjaxDestinos();
	$eliminarDestino -> id_destino = $_POST["id_destino"];
	$eliminarDestino -> eliminarRutaAjax();

}

/*=============================================
AUTOCOMPLETAR
=============================================*/

if (isset($_GET['q'])){

	$autocompletar = new AjaxDestinos();
	$autocompletar -> q = $_GET['q'];
	$autocompletar -> autocompletarRutaAjax();
	
}

/*=============================================
DATOS AUTOCOMPLETAR
=============================================*/

if(isset($_POST["traerCompletar"])){

	$datos = new AjaxDestinos();
	$datos -> id_destino = $_POST["id"];
	$datos -> datosAutocompletarRutaAjax();

}


