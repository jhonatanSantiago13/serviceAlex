<?php  
/*if($_GET["ruta"] == "respaldo"){
include "modulos/respaldo.php";
}
*/
?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <title>Tablero de administración</title>

    <!--=====================================
    PLUGINS DE CSS
    ======================================-->

    <!-- Bootstrap Core CSS -->
    <link href="vista/dist/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="vista/dist/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">

    <link href="vista/dist/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">

    <link href="vista/dist/css/lib/owl.carousel.min.css" rel="stylesheet" />

    <link href="vista/dist/css/lib/owl.theme.default.min.css" rel="stylesheet" />

    <link href="vista/dist/css/helper.css" rel="stylesheet">

    <link href="vista/dist/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="vista/dist/css/sweetalert.css">

    <!--CSS DE JQUERY UI PARA AUTOCOMPLETAR -->
    <link href="vista/dist/jqueryUi/jquery-ui.css" rel="stylesheet">

    <style>
      
        #container {

        display: block; 
        position:relative

        } 

        .ui-autocomplete {

          position: absolute;

        }

    </style>

</head>

<body class="fix-header fix-sidebar">

    <!-- Preloader - style you can find in spinners.css -->

    <div class="preloader">

        <svg class="circular" viewBox="25 25 50 50">

            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>

    </div>

    <!-- Main wrapper  -->

    <div id="main-wrapper">

    <?php 
        session_start();

        if ($_SESSION["validarAlex"] == "si"){


            /* INCLUIR MODULOS O PAGINAS SOLO SI ESTA LOGEADO*/
       
            /*=============================================
            HEADER
            =============================================*/

            include "modulos/header.php";

            /*=============================================
            LATERAL
            =============================================*/

            include "modulos/lateral.php";

           /*=============================================
           CONTENIDO
           =============================================*/

           /* en base a la página que estemos solicitando */

           if(isset($_GET["ruta"])){

                if($_GET["ruta"] == "inicio" ||
                   $_GET["ruta"] == "salir" ||
                   $_GET["ruta"] == "agregar-servicios" ||
                   $_GET["ruta"] == "ver-servicios" ||
                   $_GET["ruta"] == "editar-servicio" ||
                   $_GET["ruta"] == "descargar-db" ||
                   $_GET["ruta"] == "agregar-ruta" ||
                   $_GET["ruta"] == "ver-rutas" ||
                   $_GET["ruta"] == "editar-ruta" ||
                   $_GET["ruta"] == "servicios-rutas" ||
                   $_GET["ruta"] == "editar-datos-usuario"){

                    include "modulos/".$_GET["ruta"].".php";

                }
           }else{

              include "modulos/inicio.php";

           }

      }else{

      include "modulos/login.php";

    }

  ?>

   </div>
    <!-- end wrapper  -->

    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->

     <!-- All Jquery -->

    <script src="vista/dist/js/lib/jquery/jquery.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->

    <script src="vista/dist/js/lib/bootstrap/js/popper.min.js"></script>

    <script src="vista/dist/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- slimscrollbar scrollbar JavaScript -->

    <script src="vista/dist/js/jquery.slimscroll.js"></script>

    <!--Menu sidebar -->

    <script src="vista/dist/js/sidebarmenu.js"></script>

    <!--stickey kit -->

    <script src="vista/dist/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <!--Custom JavaScript -->





    <!-- Amchart -->

     <script src="vista/dist/js/lib/morris-chart/raphael-min.js"></script>

    <script src="vista/dist/js/lib/morris-chart/morris.js"></script>

    <script src="vista/dist/js/lib/morris-chart/dashboard1-init.js"></script>





    <script src="vista/dist/js/lib/calendar-2/moment.latest.min.js"></script>

    <!-- scripit init-->

    <script src="vista/dist/js/lib/calendar-2/semantic.ui.min.js"></script>

    <!-- scripit init-->

    <script src="vista/dist/js/lib/calendar-2/prism.min.js"></script>

    <!-- scripit init-->

    <script src="vista/dist/js/lib/calendar-2/pignose.calendar.min.js"></script>

    <!-- scripit init-->

    <script src="vista/dist/js/lib/calendar-2/pignose.init.js"></script>



    <script src="vista/dist/js/lib/owl-carousel/owl.carousel.min.js"></script>

    <script src="vista/dist/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <script src="vista/dist/js/sweetalert.min.js"></script>

    <!-- scripit init-->
    <script src="vista/dist/js/scripts.js"></script>

    <script src="vista/dist/js/lib/datatables/datatables.min.js"></script>

    <script src="vista/dist/js/lib/datatables/datatables-init.js"></script>

    <!-- Autocomplete -->
    <script src="vista/dist/jqueryUi/jquery-ui.js"></script>

    <!--=====================================
    JS PERSONALIZADO
    ======================================-->

    <script src="vista/js/login.js"></script>

    <script src="vista/js/inicio.js"></script>

    <script src="vista/js/plantilla.js"></script>

    <script src="vista/js/agregarServicios.js"></script>

    <script src="vista/js/servicios.js"></script>

    <script src="vista/js/destinos.js"></script>

    <script src="vista/js/usuarios.js"></script>

</body>



</html>