<?php

class conexion{

	static public function conectar(){

		//se va utilizar la clase PDO para realizar la conexion
		/* "tipo de conexion: host=nombre del host; dbname=nombre de la db","usuario,"contraseña", 
		codigo para el lenguaje latino   */

		       $link = new PDO("mysql:host=localhost;dbname=alexadmin",
		            "root",
		            "jhonatan",
		            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		            );

		    return $link;

	} 

}