<?php

class ControladorLogin{

	/*=============================================
	LOGIN
	=============================================*/
	static public function ctrLogin($item1, $valor1, $item2, $valor2){

		$tabla = "usuarios";

		$usuario = ModeloLogin::mdlLogin($tabla, $item1, $valor1, $item2, $valor2);

		//var_dump($usuario);
		session_start();

		if($valor1 == $usuario["usuario"] && $valor2 == $usuario["contrasena"]){

				$_SESSION["validarAlex"]     = "si";
			    $_SESSION["usuarioAlex"]     = $usuario["usuario"];
				$_SESSION["imagenAlex"]      = $usuario["imagen"];
				$_SESSION["contrasenaAlex"]  = $usuario["contrasena"];

				echo "2";



		}else{

			echo "1";

		}


	}

}