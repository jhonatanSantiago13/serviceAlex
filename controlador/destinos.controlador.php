<?php

class ControladorDestinos{

	/*=============================================
	MOSTRAR DESTINOS
	=============================================*/

	static public function ctrMostrarDestinos($item, $valor, $itemOrden, $orden){

		$tabla = "destinos";

		$respuesta = ModeloDestinos::mdlMostrarDestinos($tabla, $item, $valor, $itemOrden, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ULTIMO ID DE DESTINOS
	=============================================*/

	public function ctrMaximoIdDestinos(){

		$tabla = "destinos";

		$respuesta = ModeloDestinos::mdlMaximoIdDestinos($tabla);

		return $respuesta;

	}

	/*=============================================
	GUARDAR DESTINO
	=============================================*/

	static public function ctrGuardarDestinos($datos){

		$tabla = "destinos";

		/*=============================================
		COMPROBACION DE REGISTRO REPETIDO
		=============================================*/

		$item1 = "lugar_origen";
		$valor1 = $datos["lugarOrigen"];

		$item2 = "estado_destino";
		$valor2 = $datos["estado"];

		$item3 = "ciudad_destino";
		$valor3 = $datos["ciudad"];

		$item4 = "tipo";
		$valor4 = $datos["tipoViaje"];

		$item5 = null;
		$valor5 = null;

		$destino = ModeloDestinos::mdlDestinoRepetido($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4, $item5, $valor5);

		if($destino == null){

			/* GUARDAR EL REGISTRO */

			$cantidad = $datos["cantidad"];

			//quitar dolar
			$cantidad = str_replace("$", "", $cantidad);
			//quitar coma
			$cantidad = str_replace(",", "", $cantidad);

			//quitar dolar
			$cantidad = str_replace("$", "", $cantidad);
			//quitar coma
			$cantidad = str_replace(",", "", $cantidad);

			$datosArray = array("lugarOrigen" => $datos["lugarOrigen"],
							   	"tipoViaje" => $datos["tipoViaje"],
							   	"estado" => $datos["estado"],
							   	"ciudad" => $datos["ciudad"],
							   	"cantidad" => $cantidad);
			
			$respuesta = ModeloDestinos::mdlGuardarDestinos($tabla, $datosArray);

			return $respuesta;

		}else{

			return "no";

		}

	}

	/*=============================================
	ACTUALIZAR DESTINO
	=============================================*/
	static public function ctrActualizarDestino($datos){

		$tabla = "destinos";

		/*=============================================
		COMPROBACION DE REGISTRO REPETIDO
		=============================================*/

		$item1 = "lugar_origen";
		$valor1 = $datos["lugarOrigen"];

		$item2 = "estado_destino";
		$valor2 = $datos["estado"];

		$item3 = "ciudad_destino";
		$valor3 = $datos["ciudad"];

		$item4 = "tipo";
		$valor4 = $datos["tipoViaje"];

		$item5 = "id";
		$valor5 = $datos["idDestino"];

		$destino = ModeloDestinos::mdlDestinoRepetido($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4, $item5, $valor5);

		
		
		if($destino != null){

			// return "no up";

			return "no";

		}else{

			// return "si";

			/*Actualizar registro*/

			$cantidad = $datos["cantidad"];

			//quitar dolar
			$cantidad = str_replace("$", "", $cantidad);
			//quitar coma
			$cantidad = str_replace(",", "", $cantidad);

			//quitar dolar
			$cantidad = str_replace("$", "", $cantidad);
			//quitar coma
			$cantidad = str_replace(",", "", $cantidad);


			$datosArray = array("lugarOrigen" => $datos["lugarOrigen"],
							   	"tipoViaje" => $datos["tipoViaje"],
							   	"cantidad" => $cantidad,
							    "id" => $datos["idDestino"]);

			$respuesta = ModeloDestinos::mdlActualizarDestino($tabla, $datosArray);

			return $respuesta;


		}

	}

	/*=============================================
	ELIMINAR DESTINO
	=============================================*/

	static public function ctrEliminarDestino($item, $valor){

		$tabla = "destinos";

		$respuesta = ModeloDestinos::mdlEliminarDestino($tabla, $item, $valor);

		/*=============================================
		ACOMODAR LOS ID CONSECUTIVOS
		=============================================*/

		if($respuesta == "ok"){

			$idMax = ModeloDestinos::mdlIdDestino($tabla);

			$nuevoId = $idMax["idMax"] + 1;

			$respuestaAcomodar = ModeloDestinos::mdlActualizarId($tabla, $nuevoId);

			return $respuestaAcomodar;

		}

	}

	/*=============================================
	AUTOCOMPLETAR
	=============================================*/
	
	static public function ctrAutocompletarDestinos($item, $valor){

		$tabla = "destinos";

		$respuesta = ModeloDestinos::mdlAutocompletarDestinos($tabla, $item, $valor);

		foreach ($respuesta as $key => $value) {
			
			$arreglo[] = $value["id"].",(".$value["tipo"].") ".$value["lugar_origen"]." - ".$value["ciudad_destino"];

		}

		return $arreglo;

	}

}