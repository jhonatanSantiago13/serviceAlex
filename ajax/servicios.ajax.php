<?php

require_once "../controlador/servicios.controlador.php";
require_once "../modelo/servicios.modelo.php";

class AjaxServicios{

	public $tipo;
	public $fecha;
	public $hora_inicio;
	public $hora_fin;
	public $origen;
	public $destino;
	public $cantidad;
	public $descripcion;

	/*=============================================
	OBTENER CANTIDAD
	=============================================*/

	public $hora_inicioCantiadad;
	public $hora_finCantiadad;
	public $fechaCantiadad;

	public function obtenerCantidadAjax(){

	 $datos = array("hora_inicioCantiadad" => $this->hora_inicioCantiadad,
					"hora_finCantiadad" => $this->hora_finCantiadad,
				    "fechaCantiadad" => $this->fechaCantiadad);

	 $respuesta = ControladorServicios::ctrObtenerMontoServicios($datos);

	 echo $respuesta;


	}

	/*=============================================
	AGREGAR SERVICIO
	=============================================*/

	public function agregarServicioAjax(){

		$datos = array("tipo" => $this->tipo,
					   "fecha" => $this->fecha,
					   "hora_inicio" => $this->hora_inicio,
					   "hora_fin" => $this->hora_fin,
					   "origen" => $this->origen,
					   "destino" => $this->destino,
					   "cantidad" => $this->cantidad,
					   "descripcion" => $this->descripcion);

		$respuesta = ControladorServicios::ctrAgregarServicios($datos);

		echo json_encode($respuesta);

	}

	/*=============================================
	TRAER SERVICIO
	=============================================*/

	public $id_recibo;

	public function traerServicioAjax(){

		$item = "id_recibo";
		$valor = $this->id_recibo;
		$itemOrden = null;
		$orden = null;

		$respuesta = ControladorServicios::ctrMostrarServicios($item, $valor, $itemOrden, $orden);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTUALIZAR SERVICIO
	=============================================*/

	public $id_reciboActualizar;

	public function actualizarServicioAjax(){

		$datos = array("id_recibo" => $this->id_reciboActualizar,
					   "tipo" => $this->tipo,
					   "fecha" => $this->fecha,
					   "hora_inicio" => $this->hora_inicio,
					   "hora_fin" => $this->hora_fin,
					   "origen" => $this->origen,
					   "destino" => $this->destino,
					   "cantidad" => $this->cantidad,
					   "descripcion" => $this->descripcion);

		$respuesta = ControladorServicios::ctrActualizarServicio($datos);

		echo $respuesta;

	}

	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/

	public $id_reciboEliminar;

	public function eliminarServicioAjax(){

		$item = "id_recibo";
		$valor = $this->id_reciboEliminar;

		$respuesta = ControladorServicios::ctrEliminarServicio($item, $valor);

		echo $respuesta;

	}

}//end clase

/*=============================================
OBTENER CANTIDAD
=============================================*/

if(isset($_POST["hora_inicioCantiadad"])){

	$monto = new AjaxServicios();
	$monto -> hora_inicioCantiadad  = $_POST["hora_inicioCantiadad"];
	$monto -> hora_finCantiadad = $_POST["hora_finCantiadad"];
	$monto -> fechaCantiadad = $_POST["fechaCantiadad"];
	$monto -> obtenerCantidadAjax();

}

/*=============================================
AGREGAR SERVICIO
=============================================*/

if(isset($_POST["agregar"])) {

	$agregarServicio = new AjaxServicios();
	$agregarServicio -> tipo = $_POST["tipo"];
	$agregarServicio -> fecha = $_POST["fecha"];
	$agregarServicio -> hora_inicio = $_POST["hora_inicio"];
	$agregarServicio -> hora_fin = $_POST["hora_fin"];
	$agregarServicio -> origen = $_POST["origen"];
	$agregarServicio -> destino = $_POST["destino"];
	$agregarServicio -> cantidad = $_POST["cantidad"];
	$agregarServicio -> descripcion = $_POST["descripcion"];

	$agregarServicio -> agregarServicioAjax();

}

/*=============================================
TRAER SERVICIO
=============================================*/

if(isset($_POST["traer"])){

	$traer = new AjaxServicios();
	$traer -> id_recibo = $_POST["id_recibo"];
	$traer -> traerServicioAjax();

}

/*=============================================
ACTUALIZAR SERVICIO
=============================================*/

if(isset($_POST["id_reciboActualizar"])){

	$actualizar = new AjaxServicios();
	$actualizar -> id_reciboActualizar = $_POST["id_reciboActualizar"];
	$actualizar -> tipo = $_POST["tipo"];
	$actualizar -> fecha = $_POST["fecha"];
	$actualizar -> hora_inicio = $_POST["hora_inicio"];
	$actualizar -> hora_fin = $_POST["hora_fin"];
	$actualizar -> origen = $_POST["origen"];
	$actualizar -> destino = $_POST["destino"];
	$actualizar -> cantidad = $_POST["cantidad"];
	$actualizar -> descripcion = $_POST["descripcion"];

	$actualizar -> actualizarServicioAjax();


}

/*=============================================
ELIMINAR SERVICIO
=============================================*/

if(isset($_POST["id_reciboEliminar"])){

	$eliminar = new AjaxServicios();
	$eliminar -> id_reciboEliminar = $_POST["id_reciboEliminar"];
	$eliminar -> eliminarServicioAjax();

}