<?php

date_default_timezone_set('america/mexico_city');

class ControladorServicios{

	/*=============================================
	MOSTRAR ESTADISTICAS
	=============================================*/

	static public function ctrMostrarEstadisticas($fechadel, $fechaal, $tipo, $metodo){

		/*=============================================
		DEFINIR EL TIPO DE BUSQUEDA DE ESTADISTICAS
		=============================================*/



		if($metodo == "funcion"){


			/*=============================================
			POR FUNCION
			=============================================*/

			//obtener los rangos de fecha

			$fecha = date("y-m-d");
			$dia = date('l', strtotime($fecha));

			switch($dia){

				case 'Monday':

				$nuevafecha = strtotime ( '-8 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;


				case 'Tuesday':
				$nuevafecha = strtotime ( '-9 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

				case 'Wednesday':
				$nuevafecha = strtotime ( '-10 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

				case 'Thursday':
				$nuevafecha = strtotime ( '-11 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

				case 'Friday':
				$nuevafecha = strtotime ( '-12 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

				case 'Saturday':
				$nuevafecha = strtotime ( '-13 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

				case 'Sunday':
				$nuevafecha = strtotime ( '-7 day' , strtotime ( $fecha ) ) ;
			    $nuevafecha = date ( 'y-m-d' , $nuevafecha );
				$nuevafecha;
				break;

			}//end switch


				$tabla = "servicios";
				$item = "fecha";

				$tipo = "todos";


				$respuesta = ModeloServicios::mdlMostrarEstadisticas($tabla, $item, $nuevafecha, $fecha, $tipo);



				$formatter = new NumberFormatter('en_US',  NumberFormatter::CURRENCY);
				$monto = $formatter->formatCurrency($respuesta["monto"], 'USD');

				$estadisticas = array("monto" => $monto,
									  "nservicio" => $respuesta["nservicio"],
									  "nhoras" => $respuesta["nhoras"]);

				return $estadisticas;


		} elseif ($metodo == "filtrar") {

				/*=============================================
				POR FILTRO
				=============================================*/

				// $fechadel = $fechadel;
				// $fechaal  = $fechaal;
				// $tipo     = $tipo;
				$tabla = "servicios";
				$item = "fecha";

				if($fechaal == "na"){

				$fechaal = date("Y-m-d");

				}

				$respuesta2 = ModeloServicios::mdlMostrarEstadisticas($tabla, $item, $fechadel, $fechaal, $tipo);

				$formatter = new NumberFormatter('en_US',  NumberFormatter::CURRENCY);
				$monto = $formatter->formatCurrency($respuesta2["monto"], 'USD');

				$estadisticas2 = array("monto" => $monto,
									  "nservicio" => $respuesta2["nservicio"],
									  "nhoras" => $respuesta2["nhoras"],
									  "fechaal" => $fechaal);

				return $estadisticas2;

		}

	}

	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/

	static public function ctrMostrarServicios($item, $valor, $itemOrden, $orden){


		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor, $itemOrden, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ULTIMO ID DE SERVICIOS
	=============================================*/
	public function ctrMaximoIdServicios(){

		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlMaximoIdServicios($tabla);

		return $respuesta;

	}

	/*=============================================
	OBTENER MONTO DEL SERVICIO
	=============================================*/

	static public function ctrObtenerMontoServicios($datos){

		$hora_inicio = $datos["hora_inicioCantiadad"];
		$hora_fin    = $datos["hora_finCantiadad"];
		$fecha       = $datos["fechaCantiadad"];

		function formato($hora, $fecha){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){
			$h = substr($hora, 1, 1);

			}else{

			$h = substr($hora, 0, 2);
			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			//fecha
			$year = substr($fecha, 0, 4);
			$mes  = substr($fecha, 5, 2);
			$dia  = substr($fecha, 8, 2);


			return mktime($h,$m,$s,$mes,$dia,$year);

		}

		function formatoHora($hora){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){
			$h = substr($hora, 1, 1);

			}else{

			$h = substr($hora, 0, 2);
			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			return mktime($h,$m,$s);

		}

		$ht1 = formatoHora($hora_inicio);
		$ht2 = formatoHora($hora_fin);

		if($ht1 > $ht2){

			$fechat = date_create($fecha);

			date_add($fechat, date_interval_create_from_date_string('1 day'));

			$fechaend = date_format($fechat, 'Y-m-d');

		}else{

			$fechaend = $fecha;

		}

		$horaI = formato($hora_inicio, $fecha);

		$horaF = formato($hora_fin, $fechaend);

		$segundos=$horaF-$horaI;

		// Ahora pasas de segundos, a horas
		$horas=$segundos/60/60;

		$cantidad = $horas * 150;

		return $cantidad;

	}

	/*=============================================
	AGREGAR SERVICIO
	=============================================*/

	static public function ctrAgregarServicios($datos){

		$tipo        = $datos["tipo"];
		$fecha       = $datos["fecha"];
		$hora_inicio = $datos["hora_inicio"];
		$hora_fin    = $datos["hora_fin"];
		$origen      = $datos["origen"];
		$destino     = $datos["destino"];
		$cantidad    = $datos["cantidad"];
		$descripcion = $datos["descripcion"];
		$estatus     = "Pendiente";

		//obtener la cantidad de horas
		function formato($hora, $fecha){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){

				$h = substr($hora, 1, 1);

			}else{

				$h = substr($hora, 0, 2);

			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			//fecha
			$year = substr($fecha, 0, 4);
			$mes  = substr($fecha, 5, 2);
			$dia  = substr($fecha, 8, 2);


			return mktime($h,$m,$s,$mes,$dia,$year);

		}

		function formatoHora($hora){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){
			$h = substr($hora, 1, 1);

			}else{

			$h = substr($hora, 0, 2);
			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			return mktime($h,$m,$s);

		}

		$ht1 = formatoHora($hora_inicio);
		$ht2 = formatoHora($hora_fin);

		if($ht1 > $ht2){

			$fechat = date_create($fecha);
			date_add($fechat, date_interval_create_from_date_string('1 day'));
			$fechaend = date_format($fechat, 'Y-m-d');

		}else{

			$fechaend = $fecha;

		}

		$horaI = formato($hora_inicio, $fecha);
		$horaF = formato($hora_fin, $fechaend);

		$segundos=$horaF-$horaI;

		// Ahora pasas de segundos, a horas
		$total_horas=$segundos/60/60;

		//tratar el monto de la cantidad para la insercion

		//quitar dolar
		$dolar = str_replace("$", "", $cantidad);
		//quitar coma
		$cantidadt = str_replace(",", "", $dolar);


		$arrayDatos = array("tipo" => $tipo,
						    "fecha" => $fecha,
						    "hora_inicio" => $hora_inicio,
						    "hora_fin" => $hora_fin,
						    "origen" => $origen,
						    "destino" => $destino,
						    "cantidad" => $cantidadt,
						    "descripcion" => $descripcion,
						    "total_horas" => $total_horas,
						    "estatus" => $estatus);

		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlAgregarServicios($tabla, $arrayDatos);

		if($respuesta == "ok"){

			$idServicio = ModeloServicios::mdlIdServicio($tabla);

			if($idServicio["idMax"] != null){

				$id_recibo = $idServicio["idMax"];

				$recibo = array( "respuesta" => 'ok',
					             "recibo" => $id_recibo);

				return $recibo;

			}

		}

	}

	/*=============================================
	ACTUALIZAR SERVICIO
	=============================================*/

	static public function ctrActualizarServicio($datos){

		$id_recibo   = $datos["id_recibo"];
		$tipo        = $datos["tipo"];
		$fecha       = $datos["fecha"];
		$hora_inicio = $datos["hora_inicio"];
		$hora_fin    = $datos["hora_fin"];
		$origen      = $datos["origen"];
		$destino     = $datos["destino"];
		$cantidad    = $datos["cantidad"];
		$descripcion = $datos["descripcion"];

		//obtener la cantidad de horas
		function formato($hora, $fecha){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){

				$h = substr($hora, 1, 1);

			}else{

				$h = substr($hora, 0, 2);

			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			//fecha
			$year = substr($fecha, 0, 4);
			$mes  = substr($fecha, 5, 2);
			$dia  = substr($fecha, 8, 2);


			return mktime($h,$m,$s,$mes,$dia,$year);

		}

		function formatoHora($hora){

			$hc = substr($hora, 0, 1);

			if($hc == "0"){
			$h = substr($hora, 1, 1);

			}else{

			$h = substr($hora, 0, 2);
			}

			$m = substr($hora, 3, 2);
			$s = "00";
			//$s = substr($fecha, 6, 2);

			return mktime($h,$m,$s);

		}

		$ht1 = formatoHora($hora_inicio);
		$ht2 = formatoHora($hora_fin);

		if($ht1 > $ht2){

			$fechat = date_create($fecha);
			date_add($fechat, date_interval_create_from_date_string('1 day'));
			$fechaend = date_format($fechat, 'Y-m-d');

		}else{

			$fechaend = $fecha;

		}

		$horaI = formato($hora_inicio, $fecha);
		$horaF = formato($hora_fin, $fechaend);

		$segundos=$horaF-$horaI;

		// Ahora pasas de segundos, a horas
		$total_horas=$segundos/60/60;

		//tratar el monto de la cantidad para la insercion

		//quitar dolar
		$dolar = str_replace("$", "", $cantidad);
		//quitar coma
		$cantidadt = str_replace(",", "", $dolar);

		$arrayDatos = array("id_recibo" => $id_recibo,
			                "tipo" => $tipo,
						    "fecha" => $fecha,
						    "hora_inicio" => $hora_inicio,
						    "hora_fin" => $hora_fin,
						    "origen" => $origen,
						    "destino" => $destino,
						    "cantidad" => $cantidadt,
						    "descripcion" => $descripcion,
						    "total_horas" => $total_horas);

		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlActualizarServicio($tabla, $arrayDatos);

		return $respuesta;


	}

	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/

	static public function ctrEliminarServicio($item, $valor){

		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlEliminarServicio($tabla, $item, $valor);

		if($respuesta == "ok"){

			/*=============================================
			ACOMODAR LOS ID CONSECUTIVOS
			=============================================*/

			$idMax = ModeloServicios::mdlIdServicio($tabla);

			$nuevoIdRecibo = $idMax["idMax"] + 1;

			$respuestaAcomodar = ModeloServicios::mdlActualizarId($tabla, $nuevoIdRecibo);

			return $respuestaAcomodar;


		}

	}

}