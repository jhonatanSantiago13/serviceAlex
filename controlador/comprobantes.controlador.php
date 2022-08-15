<?php  

date_default_timezone_set('america/mexico_city');

class ContoladorComprobantes{

	/*=============================================
	IMPRIMIR COMPROBANTE
	=============================================*/
	
	public function ctrImprimirComprobante(){

		

		if(isset($_GET["id_recibo"])){


			header("Content-type: image/jpeg");

			$item = "id_recibo";
			$valor = $_GET["id_recibo"];
			$itemOrden = null;
			$orden = null;

			$servicios = ControladorServicios::ctrMostrarServicios($item, $valor, $itemOrden, $orden);

			if($servicios["tipo"] == "Primex"){

			  $sinde = substr($servicios["total_horas"], 3, 2);

			  if($sinde == "00"){

				    if(round($servicios["total_horas"]) > 1){
				      
				      	$lay = " Horas";

				    }else{

				      	$lay = " Hora";

				    }

				    $cantidad = round($servicios["total_horas"]).$lay;

			  }else{

			  		$cantidad = round($servicios["total_horas"], 1)." Horas";
			}
			  
			}else{

				$formatter = new NumberFormatter('en_US',  NumberFormatter::CURRENCY);
				$cantidad = $formatter->formatCurrency($servicios["cantidad"], 'USD');

			}

			function fechaFormato($fecha) {
  
			  $numeroDia = date('d', strtotime($fecha));
			  $dia = date('l', strtotime($fecha));
			  $mes = date('F', strtotime($fecha));
			  $anio = date('Y', strtotime($fecha));
			  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
			  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
			  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
			  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

			  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

			}

			$fechaserv = $servicios["fecha"];

			//$im = imagecreatefromjpeg("C:/AppServ/www/service/vista/images/recibo1.jpg");
			$im = imagecreatefromjpeg("../../vista/images/recibo1.jpg");

			$fondo = imagecolorallocate($im, 255, 0, 0);
			$rojo = imagecolorallocate($im, 255, 0, 0);
			$negro = imagecolorallocate($im, 0, 0, 0);
			$fecha = fechaFormato($fechaserv);
			$origen = $servicios['origen'];
			$destino = $servicios['destino'];
			$observaciones = $servicios['descripcion'];
			// $fuente = "C:/AppServ/www/service/controlador/cour.ttf";
			$fuente = "../../vista/dist/cour.ttf";
			imagettftext($im, 13, 0, 430, 40, $rojo, $fuente, $valor);
			imagettftext($im, 10, 0, 145, 155, $negro, $fuente, $fecha);
			imagettftext($im, 12, 0, 115, 198, $negro, $fuente, $origen);
			imagettftext($im, 12, 0, 115, 238, $negro, $fuente, $destino);
			imagettftext($im, 12, 0, 115, 284, $negro, $fuente, $cantidad);
			imagettftext($im, 10, 0, 40, 354, $negro, $fuente, $observaciones);
			//imagepng($im);
			imagejpeg($im);
			imagedestroy($im);

		}// end isset

	}

}

?>