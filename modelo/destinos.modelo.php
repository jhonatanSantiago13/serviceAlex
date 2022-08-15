<?php

require_once "conexion.php";

class ModeloDestinos{

	/*=============================================
	MOSTRAR DESTINOS
	=============================================*/

  	static public function mdlMostrarDestinos($tabla, $item, $valor, $itemOrden, $orden){

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
  	MOSTRAR ULTIMO ID DE DESTINOS
  	=============================================*/
  	
  	static public function mdlMaximoIdDestinos($tabla){

  		$stmt = Conexion::conectar()->prepare("SELECT MAX(id) AS maxiddes FROM destinos");

  		$stmt -> execute();

  		return $stmt -> fetch();

  		$stmt -> close();
  		$stmt = null;

  	}

    /*=============================================
    COMPROBACION DE REGISTRO REPETIDO
    =============================================*/

    static public function mdlDestinoRepetido($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4, $item5, $valor5){

        if($item5 == null && $valor5 == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 AND $item3 = :$item3 AND $item4 = :$item4");

            $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 AND $item3 = :$item3 AND $item4 = :$item4 AND $item5 != :$item5");

            $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item5, $valor5, PDO::PARAM_INT);

        }

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();
        $stmt = null;

    }

    /*=============================================
    GUARDAR DESTINO
    =============================================*/

    static public function mdlGuardarDestinos($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO destinos (lugar_origen, estado_destino, ciudad_destino, tipo, cantidad) 
             VALUES(:lugar_origen, :estado_destino, :ciudad_destino, :tipo, :cantidad)");

        $stmt -> bindParam(":lugar_origen", $datos["lugarOrigen"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado_destino", $datos["estado"], PDO::PARAM_STR);
        $stmt -> bindParam(":ciudad_destino", $datos["ciudad"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo", $datos["tipoViaje"], PDO::PARAM_STR);
        $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;      

    }

    /*=============================================
    ACTUALIZAR DESTINO
    =============================================*/
    static public function mdlActualizarDestino($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET lugar_origen = :lugar_origen, tipo = :tipo, cantidad = :cantidad WHERE
        id = :id");

        $stmt -> bindParam(":lugar_origen", $datos["lugarOrigen"], PDO::PARAM_STR);
        $stmt -> bindParam(":tipo", $datos["tipoViaje"], PDO::PARAM_STR);
        $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if($stmt -> execute()){

          return "ok";

        }else{

          return "error";

        }

        $stmt -> close();
        $stmt = null;

    }

    /*=============================================
    ELIMINAR DESTINO
    =============================================*/

    static public function mdlEliminarDestino($tabla, $item, $valor){

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
    AUTOCOMPLETAR
    =============================================*/

    static public function mdlAutocompletarDestinos($tabla, $item, $valor){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '%$valor%' ");

      $stmt -> execute();

      return $stmt -> fetchAll();

      $stmt -> close();
      $stmt = null;



    }

    /*=============================================
  OBTENER MAX ID DE DESTINOS
  =============================================*/

    static public function mdlIdDestino($tabla){

      $stmt = Conexion::conectar()->prepare("SELECT MAX(id) AS idMax FROM $tabla");

      $stmt -> execute();

      return $stmt -> fetch();

      $stmt -> close();
      $stmt = null;

    }

    static public function mdlActualizarId($tabla, $valor){

      $stmt = Conexion::conectar()->prepare("ALTER TABLE $tabla
      MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=$valor;");

      if($stmt -> execute()){

        return "ok";

      }else{

        return "error";

      }

      $stmt -> close();
      $stmt = null;

      }

}