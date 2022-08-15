
/*=============================================
OBTENER EL COSTO DEL SERVICIO
=============================================*/

$(document).on("blur","#hora_fin", function (){

    var hora_inicio = $("#hora_inicio").val();

    var hora_fin = $(this).val();

    var tipo = $("#tipo").val();

    var fecha = $("#fecha").val();

    var colorusu = $("#cantidad").css("border-color");

    if(tipo == "Primex"){

        $.ajax({

            url: "ajax/servicios.ajax.php",

            method: "POST",

            data: {hora_inicioCantiadad: hora_inicio, hora_finCantiadad: hora_fin, fechaCantiadad: fecha},

            success: function(data){

                //console.log("data", data);

                $("#cantidad").val(data);

                monedaChange();

                if(colorusu == "rgb(255, 0, 0)"){

                    $("#cantidad").css("border-color", "green");

                }

            }

        })

    }

})

/*=============================================
AGREGAR SERVICIO
=============================================*/

$(document).on("click","#guardar", function (){


    var tipo        = $("#tipo").val();
    var fecha       = $("#fecha").val();
    var hora_inicio = $("#hora_inicio").val();
    var hora_fin    = $("#hora_fin").val();
    var origen      = $("#origen").val();
    var destino     = $("#destino").val();
    var cantidad    = $(".cantidadAgregar").val();
    var descripcion = $("#descripcion").val();
    var verificar   = true;

    if(tipo == "seleccionar"){

        //alert("Elige el tipo de servicio");
        $("#tipo").css("border-color","red");
        verificar = false;

    }

    if(!fecha){

        //alert("Campo fecha está vacio");
        $("#fecha").css("border-color","red");
        verificar = false;
    }

    if(!hora_inicio){

        //alert("Indicar la hora de inicio");
        $("#hora_inicio").css("border-color","red");
        verificar = false;
    }


    if(!hora_fin){

        //alert("Indicar la hora de fin");
        $("#hora_fin").css("border-color","red");
        verificar = false;
    }

    if(!origen){

        //alert("Indicar el lugar de origen");
        $("#origen").css("border-color","red");
        verificar = false;
    }


    if(!destino){

        //alert("Indicar el destino");
        $("#destino").css("border-color","red");
        verificar = false;
    }

    if(!cantidad){

        //alert("Ingrese la cantidad");
        $("#cantidad").css("border-color","red");
        verificar = false;
    }

    if(!descripcion){

        //alert("Indique la descripción del servicio");
        $("#descripcion").css("border-color","red");
        verificar = false;
    }

    if(verificar){

        var agregar = "si";

        $.ajax({
            url: "ajax/servicios.ajax.php",
            method: "POST",
            data: {tipo: tipo, fecha: fecha, hora_inicio: hora_inicio, hora_fin: hora_fin, origen: origen, destino: destino, cantidad: cantidad, descripcion: descripcion, agregar: agregar},
            dataType: "json",
            success: function(data){

                //console.log("data", data["respuesta"]);

                if(data["respuesta"] == "ok"){

                     var id_recibo = data["recibo"];
                     //var url = "comprobante?id_recibo="+id_recibo;
                     var url = "vista/modulos/comprobante.php?id_recibo="+id_recibo;

                      window.open(url, '_blank');

                     // document.location.href=url;


                }else{

                    //alert("Ha ocurrido un error");
                     swal("ERROR AL GUARDAR!", "No se ha podido guardar el recibo!", "error");

                }

            }

        })

    }else{

        // !verificar

        swal("ATENCIÓN!", "Hay uno o más campos vacios!", "warning");

    }



})

/*=============================================
LIMPIAR INPUTS
=============================================*/

$(document).on("click","#borrar", function(){

    $("#tipo").val("seleccionar");
    $("#fecha").val("");
    $("#hora_inicio").val("");
    $("#hora_fin").val("");
    $("#origen").val("");
    $("#destino").val("");
    $(".cantidadAgregar").val("");
    $("#descripcion").val("");

})


/*=============================================
CAMBIAR EL BORDE ROJO DE LOS INPUTS A VERDE
=============================================*/

$("select[name=tipo]").change(function(){

       // alert($('select[name=tiposer]').val());

       var tipo = $('select[name=tipo]').val();
       var colorusu = $("#tipo").css("border-color");

       if(tipo !="seleccionar" && colorusu == "rgb(255, 0, 0)"){

          $("#tipo").css("border-color", "green");

        }

});


$("#fecha").change(function(){

    var c = this.value.length;
    var colorusu = $("#fecha").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#fecha").css("border-color", "green");

    }

})


$("#hora_inicio").change(function(){
    var c = this.value.length;
    var colorusu = $("#hora_inicio").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#hora_inicio").css("border-color", "green");

    }

})

$("#hora_fin").change(function(){

    var c = this.value.length;
    var colorusu = $("#hora_fin").css("border-color");

    if(c > 1 && colorusu == "rgb(255, 0, 0)"){

        $("#hora_fin").css("border-color", "green");

    }

})


$("#origen").keypress(function(){

        var colorusu = $("#origen").css("border-color");

       if(colorusu == "rgb(255, 0, 0)"){

        $("#origen").css("border-color", "green");

       }

})

$("#destino").keypress(function(){

        var colorusu = $("#destino").css("border-color");

       if(colorusu == "rgb(255, 0, 0)"){

            $("#destino").css("border-color", "green");

       }

})


$("#cantidad").keypress(function(){

        var colorusu = $("#cantidad").css("border-color");

       if(colorusu == "rgb(255, 0, 0)"){

        $("#cantidad").css("border-color", "green");

       }

})

$("#descripcion").keypress(function(){

        var colorusu = $("#descripcion").css("border-color");

       if(colorusu == "rgb(255, 0, 0)"){

        $("#descripcion").css("border-color", "green");

       }

})