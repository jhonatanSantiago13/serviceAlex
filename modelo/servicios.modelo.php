<?php

require_once "conexion.php";

class ModeloServicios{


	/*=============================================
	MOSTRAR ESTADISTICAS
	=============================================*/

	static public function mdlMostrarEstadisticas($tabla, $item, $nuevafecha, $fecha, $tipo){


		if($tipo == "todos"){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidad) AS monto, COUNT(*) AS nservicio, SUM(total_horas) AS nhoras FROM  $tabla WHERE $item BETWEEN  :nuevafecha AND  :fecha ");

			$stmt -> bindParam(":nuevafecha", $nuevafecha, PDO::PARAM_STR);
			$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidad) AS monto, COUNT(*) AS nservicio, SUM(total_horas) AS nhoras FROM  $tabla WHERE tipo = :tipo AND $item BETWEEN  :nuevafecha AND  :fecha ");

			$stmt -> bindParam(":nuevafecha", $nuevafecha, PDO::PARAM_STR);
			$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
			$stmt -> bindParam(":tipo", $tipo, PDO::PARAM_STR);

		}
	
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/
	static public function mdlMostrarServicios($tabla, $item, $valor, $itemOrden, $orden){


		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $itemOrden $orden");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ULTIMO ID DE SERVICIOS
	=============================================*/
	static public function mdlMaximoIdServicios($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_recibo) AS maxid FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	AGREGAR SERVICIO
	=============================================*/

	static public function mdlAgregarServicios($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, fecha, hora_inicio, hora_fin, origen, destino, cantidad, descripcion, total_horas, estatus) VALUES (:tipo, :fecha, :hora_inicio, :hora_fin, :origen, :destino, :cantidad, :descripcion, :total_horas, :estatus)");

		$stmt -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
		$stmt -> bindParam(":origen", $datos["origen"], PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":total_horas", $datos["total_horas"], PDO::PARAM_STR);
		$stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	OBTENER MAX ID DE SERVICIOS
	=============================================*/

	public function mdlIdServicio($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(id_recibo) AS idMax FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR SERVICIO
	=============================================*/

	static public function mdlActualizarServicio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE servicios SET tipo = :tipo, fecha = :fecha, hora_inicio = :hora_inicio, hora_fin = :hora_fin, origen = :origen, destino = :destino, cantidad = :cantidad, descripcion = :descripcion, total_horas = :total_horas WHERE id_recibo = :id_recibo");

		$stmt -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
		$stmt -> bindParam(":origen", $datos["origen"], PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":total_horas", $datos["total_horas"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_recibo", $datos["id_recibo"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	ACOMODAR LOS ID CONSECUTIVOS
	=============================================*/

	static public function mdlActualizarId($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("ALTER TABLE $tabla
		MODIFY id_recibo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=$valor;");

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/

	static public function mdlEliminarServicio($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	REPORTE SERVICIOS
	=============================================*/
    static public function mdlReporteServicios($tabla, $item, $fechadel, $fechaal, $current){

    	if($fechadel == null && $fechaal == null){

			// $sql = "SELECT * FROM servicios";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		}

		if($fechadel == null && $fechaal != null){

			//$sql = "SELECT * FROM servicios";	
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		}

		if($fechadel != null && $fechaal == null){

			//$sql = "SELECT * FROM servicios WHERE `fecha` BETWEEN '$fechadel' AND '$current' ";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item BETWEEN '$fechadel' AND '$current' ");

			


		}

		if($fechadel != null && $fechaal != null){

			// $sql = "SELECT * FROM servicios WHERE `fecha` BETWEEN '$fechadel' AND '$fechaal' ";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item BETWEEN '$fechadel' AND '$fechaal' ");

		}

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }

}