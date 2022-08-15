<!-- Page wrapper  -->

<div class="page-wrapper">

    <!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Tablero</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>

                <li class="breadcrumb-item active">Tablero</li>

            </ol>

    </div>

 </div>

<!-- End Bread crumb -->

<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Seccion calculo de servicios -->
                
    <div class="col-lg-12">

            <div class="card card-outline-primary">

                <h4 class="card-title">CALCULO DE SERVICIOS</h4>

                <h6 class="card-subtitle">Calcule totales de montos, horas y servicios realizados</h6>

                <div class="card-body">

                    <!-- -->
                    <div class="row">
                        
                        <div class="col-md-4">

                            <div class="form-group has-danger">

                                <label class="control-label">Fecha del</label>

                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fechadel" name="fechadel"></div>

                        </div>

                        <div class="col-md-4">

                             <div class="form-group has-danger">

                                    <label class="control-label">Fecha al</label>

                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fechaal" name="fechaal"></div>

                        </div>

                        <div class="col-md-4">

                             <div class="form-group has-danger">

                                    <label class="control-label">Tipo de viaje</label>

                                    <select class="form-control custom-select" id="tipo" name="tipo">

                                            <option value="todos">Todos</option>

                                            <option value="Primex">Primex</option>

                                            <option value="Especial">Especial</option>

                                    </select>

                            </div>

                        </div>
                
                    </div>
   
                    <div class="form-actions">
                        <center>
                            <button type="submit" class="btn btn-success" id="filtrar"> <i class="fa fa-search"></i> Filtrar</button>

                            <button type="button" class="btn btn-inverse" id="restablecer">Restablecer</button>
                        </center>

                        </div>
                    

                </div>

            </div>

        </div>

        <!-- End Seccion calculo de servicios-->         

        <!-- cuadritos de estadisticas -->

        <div class="row">

			<div class="col-md-3">

                  <div class="card p-30">

                    <div class="media">

                        <div class="media-left meida media-middle">

                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>

                        </div>

                        <div class="media-body media-text-right">

                            <h2 id="monto"></h2>

                            <p class="m-b-0">Monto total</p>

                        </div>

                    </div>

                </div>     

    		</div>

            <div class="col-md-3">

                <div class="card p-30">

                    <div class="media">

                        <div class="media-left meida media-middle">

                            <span><i class="fa fa-suitcase f-s-40 color-success"></i></span>

                        </div>

                        <div class="media-body media-text-right">

                            <h2 id="nservicios"></h2>

                            <p class="m-b-0">Número de servicios</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card p-30">

                    <div class="media">

                        <div class="media-left meida media-middle">

                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>

                        </div>

                        <div class="media-body media-text-right">

                            <h2 id="horas"></h2>

                            <p class="m-b-0">Horas trabajadas</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

		<!-- cuadritos de estadisticas -->
        
        <!--SECCION RESPALDAR DB  -->
		<div id="main-wrapper">

        		<div class="unix-login">
		            <div class="container-fluid">
		                <div class="row justify-content-center">
		                    <div class="col-lg-4">
		                        <div class="login-content card">
		                            <div class="login-form">
		                                <h4 style="color: #5F04B4">Respaldar base de datos</h4>
		                               
		                                    <a href="vista/modulos/respaldo.php">

		                                          <button type="button" class="btn btn-success btn-flat btn-addon m-b-30 m-t-30" id="respaldo">Crear respaldo</button>
                                            </a>
		                                    
		                               
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>

        </div>

</div>

<!--END Container fluid  -->

     
