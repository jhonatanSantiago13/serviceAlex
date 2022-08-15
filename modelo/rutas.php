<?php

/* Se crea una ruta estatica, para solucionar la problematica de enviar mas de un parametro en la
url y que no se confunda con carpetas, para que así los archivos importados como
css se importen de manera adecuada */

class Ruta {


  public function ctrRutaServidor(){

      return "http://localhost:8080/service/";
  }

}