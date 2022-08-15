$(document).ready(function(){

	$("#guardarUsuario").click(function(event) {

		var usuario   = $("#usuariou").val();
		var password  = $("#passwordu").val();
		var passwordr = $("#passwordru").val();
		var oldUsuario = $("#oldUsuario").val();
		var verificar = true;

		if(!usuario){

			$("#usuariou").css("border-color","red");

			verificar = false;

		}

		if(!password){

			$("#passwordu").css("border-color","red");

			verificar = false;

		}

		if(!passwordr){

			$("#passwordru").css("border-color","red");

			verificar = false;

		}

		if(verificar){

			if(password != passwordr){

				swal("ERROR!", "La contraseña no coinciden, intentelo de nuevo!", "error");

				$("#passwordu").css("border-color","red");
				$("#passwordru").css("border-color","red");

				return;

			}else{

				/* PREGUNTAR SI SE DESEA ACTUALIZAR */
        
			    swal({
			        title: "ATENCIÓN",
			        text: "¿Está seguro de cambiar los datos del usuario?",
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

			            $.ajax({
			                url: "ajax/usuarios.ajax.php",
			                method: "POST",
			                data: {usuario: usuario, password: password, passwordr: passwordr, oldUsuario: oldUsuario},
			                success: function(data){

			                      // console.log("data", data);

			                      if(data == "ok"){

				                      	swal({

				                            title: "Usuario Guardado con exito",
				                            text: "se cerrará sesión para terminar el proceso",
				                            type:"success",
				                            confirmButtonText: "Cerrar",
				                            closeOnConfirm: false
			                            },

				                        function(isConfirm){

				                            if(isConfirm){

				                              document.location.href='salir';

				                            }

				                        });

			                      }else{

			                      		swal("ERROR!", "No se pudo actualizar el usuario!", "error");

			                      }



			                 //fin success
			                }

			           })

			      //fin funcion swal confirm
			      } 

			   });


			}

		}else{

			swal("ATENCIÓN!", "Hay uno o más campos vacios!", "warning");

		}

	});


	/*=============================================
	CAMBIAR INPUTS DE COLOR DE ROJO A VERDE
	=============================================*/

	$("#usuariou").keypress(function() {

		  var colorOrigen = $("#usuariou").css("border-color");

		  if( colorOrigen == "rgb(255, 0, 0)"){

		      $("#usuariou").css("border-color", "green");

		  }

	});

	$("#passwordu").keypress(function() {

		  var colorOrigen = $("#passwordu").css("border-color");

		  if( colorOrigen == "rgb(255, 0, 0)"){

		      $("#passwordu").css("border-color", "green");

		  }

	});

	$("#passwordru").keypress(function() {

		  var colorOrigen = $("#passwordru").css("border-color");

		  if( colorOrigen == "rgb(255, 0, 0)"){

		      $("#passwordru").css("border-color", "green");

		  }

	});

})