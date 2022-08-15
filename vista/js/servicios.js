$(document).ready(function(){

	/*=============================================
	CREAR LOCAL STORAGE PARA GUARDAR EL ID DEL RECIBO
	=============================================*/

	$(document).on("click", "#lsIdServicio", function(){

		//e.preventDefault();

		var id_recibo = $(this).attr("idRecibo");

		localStorage.setItem("idRecibo", id_recibo);

	})


	/*=============================================
	FUNCION PARA TRAER LOS DATOS
	=============================================*/

	function traerDatos(){

		var id_recibo = localStorage.getItem("idRecibo");

		var traer = "si";

		$.ajax({

			url: "ajax/servicios.ajax.php",
			method: "POST",
			data:{id_recibo: id_recibo, traer: traer},
			dataType: "json",
			success: function(datos){

				//console.log("datos", datos);

				$("#optipo").val(datos["tipo"]);

                $("#optipo").text(datos["tipo"]);

                $("#fechaEditar").val(datos["fecha"]);

                $("#hora_inicioEditar").val(datos["hora_inicio"]);

                $("#hora_finEditar").val(datos["hora_fin"]);

                $("#origenEditar").val(datos["origen"]);

                $("#destinoEditar").val(datos["destino"]);

                $(".cantidadEditar").val(datos["cantidad"]);

                $("#descripcionEditar").val(datos["descripcion"]);

                monedaChange();

			}
		})

	}

	traerDatos();


	/*=============================================
	OBTENER EL COSTO DEL SERVICIO
	=============================================*/

	$(document).on("blur","#hora_finEditar", function (){

	    var hora_inicio = $("#hora_inicioEditar").val();

	    var hora_fin = $(this).val();

	    var tipo = $("#tipoEditar").val();

	    var fecha = $("#fechaEditar").val();

	    var colorusu = $("#cantidadEditar").css("border-color");


	    if(tipo == "Primex"){

	  
	        $.ajax({

	            url: "ajax/servicios.ajax.php",
	            method: "POST",
	            data: {hora_inicioCantiadad: hora_inicio, hora_finCantiadad: hora_fin, fechaCantiadad: fecha},
	            success: function(data){

	                console.log("data", data);

	                // $(".cantidadEditar").val(data);

	                // monedaChange();

	                // if(colorusu == "rgb(255, 0, 0)"){

	                //     $("#cantidad").css("border-color", "green");

	                // }            

	            }

	        })

	    }

	})

	/*=============================================
	ACTUALIZAR SERVICIO
	=============================================*/
	
	$("#guardarEditar").click(function() {

		var id_reciboActualizar   = localStorage.getItem("idRecibo");
        var tipo        = $("#tipoEditar").val();
        var fecha       = $("#fechaEditar").val();
        var hora_inicio = $("#hora_inicioEditar").val();
        var hora_fin    = $("#hora_finEditar").val();
        var origen      = $("#origenEditar").val();
        var destino     = $("#destinoEditar").val();
        var cantidad    = $(".cantidadEditar").val();
        var descripcion = $("#descripcionEditar").val();
        var verificar   = true;

        /*console.log("id_reciboActualizar", id_reciboActualizar);
        console.log("tipo", tipo);
        console.log("fecha", fecha);
        console.log("hora_inicio", hora_inicio);
        console.log("hora_fin", hora_fin);
        console.log("origen", origen);
        console.log("destino", destino);
        console.log("cantidad", cantidad);
        console.log("descripcion", descripcion);*/

        /* PREGUNTAR SI ESTA SEGURO DE GUARDAR */
        
        swal({
            title: "ATENCIÓN",
            text: "¿Está seguro de guardar los cambios?",
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
                  
                if(!fecha){

	                // swal("ATENCIÓN!", "Campo fecha está vacio!", "warning");

	                $("#fechaEditar").css("border-color","red");

	                verificar = false;

                }

                if(!hora_inicio){

	                // swal("ATENCIÓN!", "Indicar la hora de inicio!", "warning");

	                $("#hora_inicioEditar").css("border-color","red");

	                verificar = false;

                }

                if(!hora_fin){

	                // swal("ATENCIÓN!", "!Indicar la hora de fin", "warning");

	                $("#hora_finEditar").css("border-color","red");

	                verificar = false;

                }

                if(!origen){

                    // swal("ATENCIÓN!", "!Indicar el lugar de origen", "warning");

                    $("#origenEditar").css("border-color","red");

                    verificar = false;

                }

                if(!destino){

                    // swal("ATENCIÓN!", "!Indicar el destino", "warning");

                    $("#destinoEditar").css("border-color","red");

                    verificar = false;

                }

                if(cantidad == "$.00"){

                    // swal("ATENCIÓN!", "Ingrese la cantidad!", "warning");

                    $(".cantidadEditar").css("border-color","red");

                    verificar = false;

                }

                if(!descripcion || descripcion == ""){

	                  // swal("ATENCIÓN!", "Indique la descripción del servicio!", "warning");

	                  $("#descripcionEditar").css("border-color","red");

	                  verificar = false;

                }

                if(verificar){

                      $.ajax({

                          url: "ajax/servicios.ajax.php",
                          method: "POST",
                          data: {id_reciboActualizar: id_reciboActualizar, tipo: tipo, fecha: fecha, hora_inicio: hora_inicio, hora_fin: hora_fin, origen: origen, destino: destino, cantidad: cantidad, descripcion: descripcion },
                          success: function(data){

                              if(data == "ok"){

                                //alert("se ha actializado con exito");
                                //document.location.href='ver-servicios';

                                swal({
                                        title: "EXITO!",
                                        text: "Se ha actualizado exitosamente",
                                        type:"success",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                      },

                                      function(isConfirm){

                                        if(isConfirm){
                                          document.location.href='ver-servicios'
                                        }

                                });

                              }

                              if(data == "error"){

                                //alert("Ha ocurrido un error");

                                swal("ERROR!", "no se ha podido guardar!", "error");

                              }

                          }//success

                      })

                }//verificar
                else{

                	swal("ATENCIÓN!", "Uno o varios campos están vacios!", "warning");

                }

          //fin funcion swal confirm
          } 

       });

		
	});

	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/

	$(document).on("click", "#eliminarser", function(){

		var id_reciboEliminar = $(this).data("id");
		

        swal({
            title: "ATENCIÓN",
            text: "¿Está seguro de guardar los cambios?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Aceptar",
            closeOnConfirm: false
          },
          function(isConfirm){
            if (isConfirm) { 

                      $.ajax({

                        url: "ajax/servicios.ajax.php",
			            method: "POST",
			            data: {id_reciboEliminar: id_reciboEliminar},
			            success: function(data){

                              if(data == "ok"){

                                swal({
                                        title: "EXITO!",
                                        text: "Se ha Eliminado exitosamente",
                                        type:"success",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                                      },

                                      function(isConfirm){

                                        if(isConfirm){
                                          document.location.href='ver-servicios'
                                        }

                                });

                              }

                              if(data == "error"){

                                swal("ERROR!", "no se ha podido Eliminar!", "error");

                              }

                          }//success

                      })

          //fin funcion swal confirm
          } 

       });

		

	})

})