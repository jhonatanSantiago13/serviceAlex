<?php

require_once "conexion.php";

class ModeloLogin{

	/*=============================================
	LOGIN
	=============================================*/
    
    static public function mdlLogin($tabla, $item1, $valor1, $item2, $valor2){


    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2");

    	$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
    	$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

    	$stmt -> execute();

    	return $stmt -> fetch();

    	$stmt -> close();

    	$stmt = null;

    }

}