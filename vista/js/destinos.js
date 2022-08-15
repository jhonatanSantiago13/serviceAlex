/*=============================================
AJAX PARA TRAER LOS ESTADOS DE LA REPUBLICA
=============================================*/
$.ajax({

  url: "vista/js/json/estados-municipios.json",
  success: function(data){
      
      var opcionesEstado="<option value='seleccionar'>--elige una opción--</option>";

      $.each( data, function( key, value ) {
          
          opcionesEstado += "<option value='"+key+"' >"+key+"</option>";
         
      });

        $("#estado").html(opcionesEstado);

  }

})

/*===============================================
TRAER LAS CIUDADES EN BASE AL ESTADO SELECCIONADO
=================================================*/

$("#estado").change(function() {

    var valor = $(this).val();

    $.ajax({

        url: "vista/js/json/estados-municipios.json",
        success: function(data){

             var cantidadCiudades = data[valor].length;
             var opcionesCiudad = "<option value='seleccionar'>--elige una opción--</option>";

             for (var i = 0; i < cantidadCiudades; i++) {
                    
                    if(data[valor][i] !=""){

                        opcionesCiudad += "<option value='"+data[valor][i]+"' >"+data[valor][i]+"</option>";

                    }

            } 

            $("#ciudad").html(opcionesCiudad);     

        }

   })

});

/*=============================================
RESET DATOS AGREGAR RUTA RUTA
=============================================*/

$("#borrarRuta").click(function() {

      $("#lugarOrigen").val("seleccionar");
      $("#tipoViaje").val("seleccionar");
      $("#estado").val("seleccionar");
      $("#ciudad").val("seleccionar");
      $("#cantidad").val("");
  
});


/*=============================================
GUARDAR RUTA
=============================================*/

$("#guardarRuta").click(function() {

	var lugarOrigen  = $("#lugarOrigen").val();
  	var tipoViaje    = $("#tipoViaje").val();
	var estado       = $("#estado").val();
	var ciudad       = $("#ciudad").val();
	var cantidad     = $("#cantidad").val();
	var verificar    =  true;

	if(lugarOrigen == "seleccionar"){

             // alert("Se debe agregar el lugar de origen");

              $("#lugarOrigen").css("border-color","red");

              verificar = false;

               //swal("ERROR!", "Se debe indicar el lugar de origen!", "error");

          }

          if(tipoViaje == "seleccionar"){

              //alert("Se debe indicar el tipo de viaje");

              $("#tipoViaje").css("border-color","red");

              verificar = false;

              //swal("ERROR!", "Se debe indicar el tipo de viaje!", "error");

          }

          if(estado == "seleccionar"){

              //alert("Indicar el estado del lugar de destino");

              $("#estado").css("border-color","red");

              verificar = false;

               //swal("ERROR!", "Indicar el estado del lugar de destino!", "error");

          }

          if(ciudad == "seleccionar"){

              //alert("Indicar la ciudad del destino");

              $("#ciudad").css("border-color","red");

              verificar = false;

               //swal("ERROR!", "Indicar la ciudad del destino!", "error");

          }

          if(!cantidad || cantidad == "$.00"){

              //alert("Ingrese la cantidad");

              $("#cantidad").css("border-color","red");

              verificar = false;

              //swal("ERROR!", "Ingrese la cantidad!", "error");

          }

          if(verificar){

          		var guardarRuta = "si";
          		
          		$.ajax({

                  	url: "ajax/destinos.ajax.php",
                  	method: "POST",
                  	data: {lugarOrigen: lugarOrigen, tipoViaje: tipoViaje, estado: estado, ciudad: ciudad, cantidad: cantidad, guardarRuta: guardarRuta},
                  	success: function(data){

                  		// console.log("data", data);
                       
                       if(data == "no"){

                          	swal("ATENCIÓN!", "El viaje ya existe!", "error");

                       }

                       if(data == "error"){

                          	swal("ERROR!", "No se ha podido guardar!", "error");

                       }

                       if(data == "ok"){

                            swal({

	                            title: "OK!",
	                            text: "Se ha guardado con exito",
	                            type:"success",
	                            confirmButtonText: "Cerrar",
	                            closeOnConfirm: false
                            },

	                        function(isConfirm){

	                            if(isConfirm){

	                              document.location.href='agregar-ruta';

	                            }

	                        });

                       }

                  	}

                })

          }else{

	          	//else verificar

	          	swal("ATENCIÓN!", "Hay uno o más campos vacios!", "warning");

          }


});

/*=============================================
CAMBIAR INPUTS DE COLOR DE ROJO A VERDE
=============================================*/

$("#lugarOrigen").change(function() {

	  var colorOrigen = $("#lugarOrigen").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#lugarOrigen").css("border-color", "green");

	  }

});

$("#tipoViaje").change(function() {

	  var colorOrigen = $("#tipoViaje").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#tipoViaje").css("border-color", "green");

	  }

});

$("#estado").change(function() {

	  var colorOrigen = $("#estado").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#estado").css("border-color", "green");

	  }

});

$("#ciudad").change(function() {

	  var colorOrigen = $("#ciudad").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#ciudad").css("border-color", "green");

	  }

});

$("#cantidad").keypress(function(){

	  var colorOrigen = $("#cantidad").css("border-color");

	  if(colorOrigen == "rgb(255, 0, 0)"){

	      $("#cantidad").css("border-color", "green");

	  }

})


/*=============================================
CREAR LOCAL STORAGE PARA GUARDAR EL ID DE LA RUTA
=============================================*/

  $(document).on("click", "#lsRuta", function(){

    // e.preventDefault();

    var id_ruta = $(this).attr("idRuta");

    // console.log("id_ruta", id_ruta);

    localStorage.setItem("idRuta", id_ruta);

  })

/*=============================================
FUNCION PARA TRAER LOS DATOS DE LA RUTA
=============================================*/

function traerDatosRutas(){

   var traerRutas = "si";

   var id_ruta = localStorage.getItem("idRuta");

  $.ajax({

      url: "ajax/destinos.ajax.php",
      method: "POST",
      data: {id_ruta: id_ruta, traerRutas: traerRutas},
      dataType: "json",
      success: function(datos){

            // console.log("datos", datos);

            $("#lugarOrigenEditar").val(datos["lugar_origen"]);
            $("#tipoViajeEditar").val(datos["tipo"]);
            $("#estadoEditar").val(datos["estado_destino"]);
            $("#ciudadEditar").val(datos["ciudad_destino"]);
            $(".cantidadDestinoEditar").val(datos["cantidad"]);

      }

  })

}

traerDatosRutas();


/*=============================================
ACTUALIZAR RUTA
=============================================*/

$("#ActualizarRuta").click(function() {

    var lugarOrigen = $("#lugarOrigenEditar").val();
    var tipoViaje = $("#tipoViajeEditar").val();
    var estado = $("#estadoEditar").val();
    var ciudad = $("#ciudadEditar").val();
    var cantidad = $(".cantidadDestinoEditar").val();
    var id_destino = localStorage.getItem("idRuta");

    if(cantidad == "$.00"){

          $("#cantidad").css("border-color","red");
          swal("ATENCIÓN!", "El campo cantidad está en ceros!", "warning");

          return;

    }

    /* PREGUNTAR SI SE DESEA ACTUALIZAR */
        
    swal({
        title: "ATENCIÓN",
        text: "¿Está seguro de actualizar el registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF0000",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false
      },
      function(isConfirm){
        if (isConfirm) { 

            /* SI ACEPTO ACTUALIZAR */

            var actualizarDestino = "si";
          
            $.ajax({
                url: "ajax/destinos.ajax.php",
                method: "POST",
                data: {id_destino: id_destino, lugarOrigen: lugarOrigen, tipoViaje: tipoViaje, estado: estado, ciudad: ciudad, cantidad: cantidad, actualizarDestino: actualizarDestino},
                success: function(data){

                      // console.log("data", data);

                      if(data == "no"){

                          swal("Destino Repetido!", "Ya hay un viaje similar guardado!", "warning");

                      }

                      if(data == "error"){

                        swal("ERROR!", "no se ha podido guardar!", "error");

                      }

                      if(data == "ok"){

                            swal({
                                    title: "EXITO!",
                                    text: "Se ha actualizado exitosamente",
                                    type:"success",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                  },

                                  function(isConfirm){

                                    if(isConfirm){
                                      document.location.href='ver-rutas';
                                    }

                                });


                        //FIN DEL ok
                      }

                 //fin success
                }

           })

      //fin funcion swal confirm
      } 

   });

});

/*=============================================
QUITAR CAMBIOS
=============================================*/

$("#reset").click(function() {

    traerDatosRutas();

});

/*=============================================
ELIMINAR DESTINO
=============================================*/

$(document).on("click", "#eliminarDestinos", function(){

    var id_destino = $(this).data("id");

    swal({
              title: "ATENCIÓN",
              text: "¿Está seguro de eliminar el registro?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#FF0000",
              cancelButtonText: "Cancelar",
              confirmButtonText: "Aceptar",
              closeOnConfirm: false
        },
        function(isConfirm){
            if (isConfirm) {    
                
                var eliminarDestino = "si";

                $.ajax({

                        url: "ajax/destinos.ajax.php",
                        method: "POST",
                        data: {id_destino: id_destino, eliminarDestino: eliminarDestino},
                        success: function(data){

                            // console.log("data", data);

                            if(data == "error"){

                              swal("ERROR!", "No se ha podido eliminar!", "error");

                            }

                            if(data == "ok"){

                                  swal({
                                          title: "EXITO!",
                                          text: "Se ha actualizado exitosamente",
                                          type:"success",
                                          confirmButtonText: "Cerrar",
                                          closeOnConfirm: false
                                        },

                                        function(isConfirm){

                                          if(isConfirm){
                                            document.location.href='ver-rutas';
                                          }

                                      });


                              //FIN DEL ok
                            }
                          
                        }

                })

            } 

    });

})

/*=============================================
AUTOCOMPLETAR
=============================================*/

$('#destino').autocomplete({

    /*=============================================
    TRAER LOS DATOS A MOSTRAR EN EL AUTOCOMPLETE
    =============================================*/

    source: function(request, response){
          $.ajax({
                url:"ajax/destinos.ajax.php",
                dataType:"json",
                data:{q:request.term},
                success: function(data){
                    response(data);
                }

          });
    },

  minLength: 1,

    select: function(event,ui){

        /*=============================================
        TRAER LOS DATOS PARA PONER EN LOS DEMAS INPUTS
        =============================================*/

        //alert("Selecciono: "+ ui.item.label);
        //$("#variable").val(ui.item.label);

        var cadena = ui.item.label;

        var arrayDatos = cadena.split(",");

        var id = arrayDatos[0];

        var traerCompletar = "si";

        $.ajax({
              url:"ajax/destinos.ajax.php",
              method:"post",
              data:{id:id, traerCompletar:traerCompletar},
              dataType:"json",
              success: function(respuesta){

                 /* var viajes = respuesta.split(">");

                  $("#tipo").val(viajes[0]);
                  $("#origen").val(viajes[1]);
                  $("#estadoViaje").val(viajes[2]);
                  $("#destinoViaje").val(viajes[3]);
                  $("#cantidad").val(viajes[4]);*/
                  
                 


                  $("#origenA").val(respuesta["lugar_origen"]);
                  $("#tipoA").val(respuesta["tipo"]);
                  $("#estadoViajeA").val(respuesta["estado_destino"]);
                  $("#destinoViajeA").val(respuesta["ciudad_destino"]);
                  $(".cantidadAutocompletar").val(respuesta["cantidad"]);
                   monedaChange();
              }

        })

    },
    /* se agrega para componer el autocomplete */ 
    appendTo: "#container"
                   
});


/*=============================================
RESET DATOS AUTOCOMPLETAR
=============================================*/

$("#borrarA").click(function() {
  
    $("#destino").val("");
    $("#tipoA").val("");
    $("#origenA").val("");
    $(".cantidadAutocompletar").val("");
    $("#estadoViajeA").val("");
    $("#destinoViajeA").val("");
    $("#fechaA").val("");
    $("#descripcionA").val("");
    $("#tipoViajeA").val("seleccionar");


});

/*=============================================
CAMBIAR DE ROJO A VERDE EL BORDE DEL INPUT de BUSQUEDA DE DESTINO
=============================================*/

$("#destino").change(function(){
    var c = this.value.length;
    var colorusu = $("#hora_inicio").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#hora_inicio").css("border-color", "green");

    }

})

/*=============================================
GUARDAR SERVICIO DE DESTINO 
=============================================*/

$("#guardarA").click(function() {
  

    var estadoViaje  = $("#estadoViajeA").val();
    var destinoViaje = $("#destinoViajeA").val();
  
    var tipo         = $("#tipoA").val();

    var tipoViaje    = $("#tipoViajeA").val();
    var fecha        = $("#fechaA").val();
    var hora_inicio = "09:00";
    var hora_fin = "23:00";
    var origen       = $("#origenA").val();
    var destinoViajeFinal = estadoViaje+", "+destinoViaje+"("+tipo+")";
    var cantidad     = $(".cantidadAutocompletar").val();
    var descripcion  = $("#descripcionA").val();



    var verificar =  true;

    if(!tipo || !origen || !estadoViaje || !destinoViaje || !cantidad){

        $("#destino").css("border-color","red");
        //verificar = false;

        swal("ERROR!", "Debe seleccionar un destino fijo!", "error");

        return;

    }

    if(!fecha){

        $("#fechaA").css("border-color","red");
        verificar = false;

    }

    if(!descripcion){

        $("#descripcionA").css("border-color","red");
        verificar = false;

    }

    if(tipoViaje == "seleccionar"){

       $("#tipoViajeA").css("border-color","red");
       verificar = false;
    }

    if(verificar){

        var agregar = "si";

        $.ajax({
            url: "ajax/servicios.ajax.php",
            method: "POST",
            data: {tipo: tipoViaje, fecha: fecha, hora_inicio: hora_inicio, hora_fin: hora_fin, origen: origen, destino: destinoViajeFinal, cantidad: cantidad, descripcion: descripcion, agregar: agregar},
            dataType: "json",
            success: function(data){

                //console.log("data", data["respuesta"]);

                if(data["respuesta"] == "ok"){

                     var id_recibo = data["recibo"];
                     //var url = "comprobante?id_recibo="+id_recibo;
                     var url = "vista/modulos/comprobante.php?id_recibo="+id_recibo;
                    
                     document.location.href=url;


                }else{

                    //alert("Ha ocurrido un error");
                     swal("ERROR AL GUARDAR!", "No se ha podido guardar el recibo!", "error");

                }
                
            }

        })

    }else{

        swal("ATENCIÓN!", "Hay uno o más campos vacios!", "warning");

    }
   

});

/*=============================================
CAMBIAR INPUTS DE ROJO A VERDE
=============================================*/

$("#fechaA").change(function(){
    var c = this.value.length;
    var colorusu = $("#fechaA").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#fechaA").css("border-color", "green");

    }

})


$("#descripcionA").keyup(function(event) {
  
    var c = this.value.length;
    var colorusu = $("#descripcionA").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#descripcionA").css("border-color", "green");

    }


});

$("#tipoViajeA").change(function(){
    var c = this.value.length;
    var colorusu = $("#tipoViajeA").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#tipoViajeA").css("border-color", "green");

    }

})