<?php

require "../controlador/usuarios.controlador.php";
require "../modelo/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	public $usuario;
	public $password;
	public $oldUsuario;

	public function actualizarUsuarioAjax(){

		$item1 = "usuario";
		$valor1 = $this->usuario;

		$item2 = "contrasena";
		$valor2 = $this->password;

		$item3 = "usuario";
		$valor3 = $this->oldUsuario;

		$respuesta = ControladorUsuarios::ctrActualizarUsuario($item1, $valo1, $item2, $valor2, $item3, $valor3);

		echo $respuesta;

	}


} //end class

if(isset($_POST["usuario"])){

	$updateUsuario = new AjaxUsuarios();
	$updateUsuario -> usuario = $_POST["usuario"];	
	$updateUsuario -> password = $_POST["password"];
	$updateUsuario -> oldUsuario = $_POST["oldUsuario"];
	
	$updateUsuario ->actualizarUsuarioAjax();

}
