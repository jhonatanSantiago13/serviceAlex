<?php

require_once "../controlador/login.controlador.php";
require_once "../modelo/login.modelo.php";

class AjaxLogin{

	/*=============================================
	LOGIN
	=============================================*/
	public $usuario;
	public $password;

	public function logeoAjax(){

		$item1  = "usuario";
		$valor1 = $this->usuario;

		$item2  = "contrasena";
		$valor2 = $this->password;

		$respuesta = ControladorLogin::ctrLogin($item1, $valor1, $item2, $valor2);

		session_start();
		echo $respuesta;


	}



}//end class

/*=============================================
LOGIN
=============================================*/

if(isset($_POST["usuario"])){

	$login = new AjaxLogin();
	$login -> usuario = $_POST["usuario"];
	$login -> password = $_POST["password"];
	$login ->logeoAjax();

}