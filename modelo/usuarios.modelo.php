<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUSARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ULTIMO ID DE USUARIOS
	=============================================*/
	static public function mdlMaximoIdUsuarios($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(id) AS maxidus FROM usuarios");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	static public function mdlActualizarUsuario($tabla, $item1, $valo1, $item2, $valor2, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item2 = :$item2 WHERE $item3 = :$item3");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

}