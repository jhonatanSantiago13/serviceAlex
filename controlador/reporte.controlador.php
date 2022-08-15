<?php

date_default_timezone_set('america/mexico_city');

class ControladorReportes{

	/*=============================================
	REPORTE SERVICIOS
	=============================================*/

	static public function ctrReporteServicios($fechadel, $fechaal){

		

		$current = date('Y-m-d');

		$item = "fecha";

		$tabla = "servicios";

		$servicios = ModeloServicios::mdlReporteServicios($tabla, $item, $fechadel, $fechaal, $current);

		// var_dump($servicios);

		/*=============================================
		ENCABEZADOS DE LA TABLA
		=============================================*/
		$archivo = utf8_decode("Fecha,Horastrabajadas,Descripción,Noderecibo,Monto");

		foreach ($servicios as $key => $value) {

			/*=============================================
			PREPARACION DE LOS DATOS
			=============================================*/

			$sinde = substr($value["total_horas"], 3, 2);

		  	if($sinde == "00"){

			    if(round($value["total_horas"]) > 1){

			      $lay = " Horas";

			    }else{

			      $lay = " Hora";

			    }

			   $total_horas = round($value["total_horas"]).$lay;

			}else{

		  		$total_horas = round($value["total_horas"], 1)." Horas";

			}

			$date  = date_create($value["fecha"]);

		    $fecha = date_format($date, 'd-m-y');

			$descripcion = utf8_decode($value["descripcion"]);

			$idRecibo = $value["id_recibo"];

			$cantidad = $value["cantidad"];

			/*=============================================
			IMPRIMIR LOS DATOS
			=============================================*/

			//$archivo="$archivo\n,$fecha,$total_horas,\"$descripcion\",$idRecibo,$cantidad";
			$archivo.="\n$fecha,$total_horas,\"$descripcion\",$idRecibo,$cantidad";
			
		}

		/*=============================================
		CREAMOS EL ARCHIVO DE EXCEL
		=============================================*/

		header("Content-Description: File Transfer");

		header("Content-Type: application/force-download");

		header("Content-Disposition: attachment; filename=Servicios ".date("Y-m-d").".csv");

		echo $archivo;

	}

	/*=============================================
	REPORTE DESTINOS
	=============================================*/

	static public function ctrReporteDestinos($tipo){

		if($tipo == "destinos"){

			$tabla = "destinos";
			$item = null;
            $valor = null;
			$itemOrden = "ciudad_destino";
            $orden = "ASC";

			$destinos = ModeloDestinos::mdlMostrarDestinos($tabla, $item, $valor, $itemOrden, $orden);

			// var_dump($destinos);

			/*=============================================
			ENCABEZADOS DE LA TABLA
			=============================================*/

			$archivo = utf8_decode("Lugar de origen,Estado de destino,Ciudad de destino,Tipo de viaje,Monto");

			foreach ($destinos as $key => $value) {
				
				$lugarOrigen   = utf8_decode($value['lugar_origen']);

				$estadoDestino = utf8_decode($value['estado_destino']);

				$ciudadDestino = utf8_decode($value['ciudad_destino']);

				$tipo = $value['tipo'];

			    $cantidad = $value['cantidad'];

			    $archivo .="\n$lugarOrigen,$estadoDestino,$ciudadDestino,$tipo,$cantidad";

			}

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			header("Content-Description: File Transfer");

			header("Content-Type: application/force-download");

			header("Content-Disposition: attachment; filename=Destinos ".date("Y-m-d").".csv");

			echo $archivo;

		}

	}
	
}