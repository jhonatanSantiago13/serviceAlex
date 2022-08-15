<?php


date_default_timezone_set('america/mexico_city');

class ControladorRespaldo{

	/*=============================================
	CREAR RESPALDO DE LA DB
	=============================================*/
	
	 public function ctrCrearRespaldo(){

	 	/*=============================================
	 	/*=============================================
	 	/*=============================================
		/*=============================================
		GENERAR TXT
		=============================================*/

		$item = null;
		$valor =null;
		$itemOrden = "id_recibo";
		$orden = "ASC";

		/*=============================================
		UBICACION Y NOMBRE DEL ARCHIVO
		=============================================*/

		//nomenclatura para crear el nombre del archivo
		$nyear    = date('Y');
		$nmes     = date('m');
		$ndia     = date('d');
		$nhora    = date('H');
		$nminuto  = date('i');
		$nsegundo = date('s');
		$nameFile = "backup-".$nyear.$nmes.$ndia.$nhora.$nminuto.$nsegundo.".txt";
        
        //echo __FILE__;

        // $archivo  = fopen("C:/AppServ/www/service/backup/".$nameFile, "a") or die("error al crear el archivo");
        $archivo  = fopen("../../backup/".$nameFile, "a") or die("error al crear el archivo");
		//fwrite($ar, "\r\n");

		/*=============================================
		ENCABEZADO Y PROCEDIMIENTOS ALMACENADOS
		=============================================*/

		fwrite($archivo, "-- Servidor: localhost");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Versión del servidor: 5.7.17-log");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Versión de PHP: 5.6.30");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");

$linea10 = <<<EOF
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
EOF;
fwrite($archivo, $linea10);
		// fwrite($archivo, $linea10);
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Base de datos: `alexadmin`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "DELIMITER $$");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Procedimientos");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `usu` VARCHAR(50), IN `pass` VARCHAR(30))  NO SQL");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "BEGIN");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "SELECT * FROM `usuarios` WHERE `usuario` = usu AND `contrasena` = pass;");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "END$$");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "DELIMITER ;");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-----------------------------------------------------------");

		/*=============================================
		TABLA SERVICIOS
		=============================================*/

		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Estructura de tabla para la tabla `servicios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "CREATE TABLE `servicios` (");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`id_recibo` int(11) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`tipo` varchar(15) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`fecha` date NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`hora_inicio` time NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`hora_fin` time NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`origen` varchar(150) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`destino` varchar(150) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`cantidad` double(8,2) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`descripcion` varchar(500) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`total_horas` double(8,2) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "`estatus` varchar(15) NOT NULL");
		fwrite($archivo, "\r\n");
		fwrite($archivo, ") ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Indices de la tabla `servicios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "ALTER TABLE `servicios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, " ADD PRIMARY KEY (`id_recibo`);");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo,  "-- AUTO_INCREMENT de la tabla `servicios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo,  "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo,  "ALTER TABLE `servicios`");
		fwrite($archivo, "\r\n");

		$maxIdRecibo = ControladorServicios::ctrMaximoIdServicios();

		//$idServiciosAI = $maxIdRecibo["maxid"] + 1;

		 $idServiciosAI = $maxIdRecibo["maxid"] +1;



		fwrite($archivo,  " MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=".$idServiciosAI.";");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");

		/*=============================================
		TABLA USUARIOS
		=============================================*/

		fwrite($archivo, "-- Estructura de tabla para la tabla `usuarios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "CREATE TABLE `usuarios` (");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `id` int(11) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `usuario` varchar(50) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `contrasena` varchar(30) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `imagen` varchar(50) NOT NULL");
		fwrite($archivo, "\r\n");
		fwrite($archivo, ") ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Indices de la tabla `usuarios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "ALTER TABLE `usuarios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, " ADD PRIMARY KEY (`id`);");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "-- AUTO_INCREMENT de la tabla `usuarios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "ALTER TABLE `usuarios`");
		fwrite($archivo, "\r\n");

		$maxIdUsuarios = ControladorUsuarios::ctrMaximoIdUsuarios();

		$idUsuariosAI = $maxIdUsuarios["maxidus"] + 1;

		fwrite($archivo, " MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=".$idUsuariosAI.";");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");

		/*=============================================
		TABLA DESTINOS
		=============================================*/

		fwrite($archivo, "-- Estructura de tabla para la tabla `destinos`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "CREATE TABLE `destinos` (");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `id` int(11) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `lugar_origen` varchar(50) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `estado_destino` varchar(100) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `ciudad_destino` varchar(100) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `tipo` varchar(20) NOT NULL,");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "  `cantidad` double(8,2) NOT NULL");
		fwrite($archivo, "\r\n");
		fwrite($archivo, ") ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "-- Indices de la tabla `destinos`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "ALTER TABLE `destinos`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, " ADD PRIMARY KEY (`id`);");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "-- AUTO_INCREMENT de la tabla `destinos`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "ALTER TABLE `destinos`");
		fwrite($archivo, "\r\n");

		$maxIdDestinos = ControladorDestinos::ctrMaximoIdDestinos();

		$idDestinosAI = $maxIdDestinos["maxiddes"] + 1;

		//fwrite($archivo, $idDestinosAI);
		fwrite($archivo, " MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=".$idDestinosAI.";");

		//write($archivo, " MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=".$idDestinosAI.";");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");

		/*=============================================
		/*=============================================
		/*=============================================
		/*=============================================
		VOLCADO DE REGISTROS
		=============================================*/


		/*=============================================
		REGISTROS DE SERVICIOS 
		=============================================*/

		//SERVICIOS
		fwrite($archivo, "-- Volcado de datos para la tabla `servicios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "INSERT INTO `servicios` (`id_recibo`, `tipo`, `fecha`, `hora_inicio`, `hora_fin`, `origen`, `destino`, `cantidad`, `descripcion`, `total_horas`, `estatus`) VALUES");
		fwrite($archivo, "\r\n");

		$servicios = ControladorServicios::ctrMostrarServicios($item, $valor, $itemOrden, $orden);

		foreach ($servicios as $key => $value) {
			
			$lineaServ = "(".$value['id_recibo'].", '".$value['tipo']."', '".$value['fecha']."', '".$value['hora_inicio']."', '".$value['hora_fin']."', '".$value['origen']."', '".$value['destino']."', ".$value['cantidad'].", '".$value['descripcion']."', ".$value['total_horas'].", '".$value['estatus']."'), ";

			fwrite($archivo, $lineaServ);
			fwrite($archivo, "\r\n");

		}//foreach servicios

		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");

		/*=============================================
		REGISTROS DE USUARIOS
		=============================================*/

		//USUARIOS
		fwrite($archivo, "-- Volcado de datos para la tabla `usuarios`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `imagen`) VALUES");
		fwrite($archivo, "\r\n");

		$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		foreach ($usuarios as $key => $value) {
			
			$lineaUsu = "(".$value['id'].", '".$value['usuario']."', '".$value['contrasena']."', '".$value['imagen']."'),";
			fwrite($archivo, $lineaUsu);
			fwrite($archivo, "\r\n");

		}//foreach usuarios

		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");

		/*=============================================
		REGISTROS DE DESTINOS
		=============================================*/

		//DESTINOS
		fwrite($archivo, "-- Volcado de datos para la tabla `destinos`");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "--");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "\r\n");
		fwrite($archivo, "INSERT INTO `destinos` (`id`, `lugar_origen`, `estado_destino`, `ciudad_destino`, `tipo`, `cantidad`) VALUES");
		fwrite($archivo, "\r\n");

		$itemOrden2 = "id";

		$destinos = ControladorDestinos::ctrMostrarDestinos($item, $valor, $itemOrden2, $orden);


		foreach ($destinos as $key => $value) {
			
			$lineaDest = "(".$value['id'].", '".$value['lugar_origen']."', '".$value['estado_destino']."', '".$value['ciudad_destino']."', '".$value['tipo']."', '".$value['cantidad']."'),";

			fwrite($archivo, $lineaDest);
			fwrite($archivo, "\r\n");

		}//foreach estinos

		/*=============================================
		DESCARGAR EL ARCHIVO
		=============================================*/

		//echo "Se ha guardado el respaldo correctamente";

		// $file = "backup/".$nameFile;

		// $type = filetype($file);
		//     // Get a date and timestamp
		//     $today = date("F j, Y, g:i a");
		//     $time = time();
		//     // Send file headers
		//     header("Content-type: $type");
		//     header("Content-Disposition: attachment;filename=backup/$nameFile.txt");
		//     header("Content-Transfer-Encoding: binary"); 
		//     header('Pragma: no-cache'); 
		//     header('Expires: 0');
		//     // Send the file contents.
		//     set_time_limit(0); 
		//     readfile($file);
		//$file = "C:/AppServ/www/service/backup/".$nameFile;
		
		$file = "../../backup/".$nameFile;
		 $type = filetype($file);
		    // Get a date and timestamp
		    $today = date("F j, Y, g:i a");
		    $time = time();
		    // Send file headers
		    header("Content-type: $type");
		    header("Content-Disposition: attachment;filename=$nameFile.txt");
		    header("Content-Transfer-Encoding: binary"); 
		    header('Pragma: no-cache'); 
		    header('Expires: 0');
		    // Send the file contents.
		    set_time_limit(0); 
		    readfile($file);
		    
			

		/*$TheFile = basename($archivo);
		header('Content-Description: File Transfer');
		ob_end_flush();

		header('Content-Type: text/plain');
		header('Content-Disposition: attachment; filename=' . $TheFile);

		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($archivo));
		ob_clean();
		flush();
		readfile($archivo);*/

	}

}

?>