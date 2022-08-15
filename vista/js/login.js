$("#login").click(function() {

	var usuario  = $("#usuario").val();

	var password = $("#password").val();

	var verificar = true;

	/*============================================
	VALIDAR CAMPOS VACIOS
  	============================================*/

  	if(!usuario){

			//alert("Campo de usuario vacio");

			$("#usuario").css("border-color","red");

			verificar = false;

		}

		if(!password){

			//alert("Campo de contraseña vacio");

			$("#password").css("border-color","red");

			verificar = false;

		}

		if(verificar){

			$.ajax({

				url: "ajax/login.ajax.php",

				method: "POST",

				data: {usuario: usuario, password: password},

				success: function(data){


					if(data == 1){

						//alert("Los datos no cooinsiden");

			         	swal("ERROR AL INTENTAR INICIAR SESIÓN!", "Los datos no cooinsiden, intentelo de nuevo!", "error");

						$("#usuario").css("border-color","red");

						$("#password").css("border-color","red");

					}

					if (data == 2){

						 window.location = "inicio";

						 //console.log("respuesta", "inicio");

					}

				}

			})

		}else{

           swal("ATENCIÓN!", "Hay uno o más campos vacios!", "warning");

        }
});

/*=============================================
CAMBIAR INPUTS DE COLOR DE ROJO A VERDE
=============================================*/

$("#usuario").keypress(function() {

	  var colorOrigen = $("#usuario").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#usuario").css("border-color", "green");

	  }

});

$("#password").keypress(function() {

	  var colorOrigen = $("#password").css("border-color");

	  if( colorOrigen == "rgb(255, 0, 0)"){

	      $("#password").css("border-color", "green");

	  }

});