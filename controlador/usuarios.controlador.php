<?php

class ControladorUsuarios{

	/*=============================================
	MOSTRAR USUSARIOS
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;


	}

	/*=============================================
	MOSTRAR ULTIMO ID DE USUARIOS
	=============================================*/

	static public function ctrMaximoIdUsuarios(){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMaximoIdUsuarios($tabla);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
    
    static public function ctrActualizarUsuario($item1, $valo1, $item2, $valor2, $item3, $valor3){

    	$tabla = "usuarios";

    	$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valo1, $item2, $valor2, $item3, $valor3);

    	return $respuesta;

    }

}