$(document).ready(function(){

	/*=============================================
	FUNCION PARA LLENAR LAS CJITAS DE ESTADISTICAS
	=============================================*/


		function datos(){

			var fun = "si";

			$.ajax({

				url: "ajax/inicio.ajax.php",
				method: "POST",
				// cache: false,
				// contentType: false,
				// processData: false,
				data: {fun: fun},
				dataType: "json",
				success: function(data){

					//console.log("data", data);

					// var valores = data.split(";");
					$("#monto").text(data["monto"]);
					$("#nservicios").text(data["nservicio"]);
					$("#horas").text(data["nhoras"]);
				}
			})

		}

		datos();

		/*=============================================
		FILTRO DE ESTADISTICAS
		=============================================*/
		$("#filtrar").click(function() {

				// console.log("hola");
				var fechadel = $("#fechadel").val();
				var fechaal  = $("#fechaal").val();
				var tipo     = $("#tipo").val();

				if(!fechadel){

			  	 	swal("Para filtar necesitas llenar los campos de fecha");

				}else{

					if(!fechaal){

				  	 	  fechaal = "na";

				  	}

				  	$.ajax({

						url: "ajax/inicio.ajax.php",
						method: "POST",
						// cache: false,
						// contentType: false,
						// processData: false,
						data:{fechadel: fechadel, fechaal: fechaal, tipo: tipo},
						dataType: "json",
						success: function(datos){

							console.log("datos", datos);

							$("#monto").text(datos["monto"]);
							$("#nservicios").text(datos["nservicio"]);
							$("#horas").text(datos["nhoras"]);

							if(fechaal == "na"){

								$("#fechaal").val(datos["fechaal"]);

							}
							
						}
					})
	  	 
				}
				
		})

		/*=============================================
		FILTRO DE ESTADISTICAS
		=============================================*/

		/*=============================================
	  BOTON RESTABLECER
	  =============================================*/
	  $("#restablecer").click(function() {

	  		datos();

	  		$("#fechadel").val("");
			$("#fechaal").val("");
			$("#tipo").val("Todos");
	  	  
	  });

	  /*=============================================
	  CREAR RESPALDO
	  =============================================*/

	  $(document).on("click", "#respaldo", function(){

			document.location.href="respaldo";



	  })

})