<!--Page wrapper  -->

<div class="page-wrapper">

	<!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Agregar Servicio Fijo</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinos Foraneos</a></li>

                <li class="breadcrumb-item active">Agregar Servicio Fijo</li>

            </ol>

        </div>

    </div>

    <!-- End Bread crumb -->

     <!-- Container fluid  -->

    <div class="container-fluid">

        <!-- row -->

        <div class="row">
            
            <!-- lg12 -->

            <div class="col-lg-12">

				 <!--card-outline  -->

                <div class="card card-outline-primary">
				
					<div class="card-header">

                        <h4 class="m-b-0 text-white">Datos del servicio</h4>

                    </div>

                    <!-- card-body -->

                    <div class="card-body">

						<form action="#">
							
							<!-- form-body -->

                            <div class="form-body">
                            	
								<div class="row p-t-20">
									
									<div class="col-md-12">
                                                
                                        <h2><small>Búsqueda del destino fijo</small></h2>

                                    </div>

                                    <div class="col-md-8">

                                        <div class="form-group">

                                            <label class="control-label" for="destino">Escribe la ciudad de destino a agregar</label>

                                            <input type="text" class="form-control" id="destino">

                                            <!-- SE AGREGA DIV PARA COMPONER EL AUTOCOMPLETE -->
                                            <div id="container"></div>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <hr>

                                        <h2><small>Datos del destino encontrado</small></h2>

                                    </div>

                                    <div class="col-md-4">
                                                

                                        <div class="form-group">

                                            <label class="control-label">Tipo del viaje</label>

                                            <input type="text" class="form-control" id="tipoA" readonly>

                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                                
                                        <div class="form-group">

                                            <label class="control-label">Origen del viaje</label>

                                            <input type="text" class="form-control" id="origenA" readonly> 

                                        </div>

                                     </div>

                                     <div class="col-md-4">
                                     	
										<div class="form-group">

                                            <label class="control-label">Cantidad ($)</label>

                                            <input type="text" class="form-control cantidadAutocompletar" id="cantidad" readonly>

                                            <small class="form-control-feedback">Monto del viaje sin incluir casetas</small>

                                        </div>

                                     </div>

                                     <div class="col-md-12">

                                         <hr>

                                         <h2><small>Datos del lugar de destino encontrado</small></h2>

                                    </div>

                                    <div class="col-md-6">
                                                
                                        <div class="form-group">

                                            <label class="control-label">Estado:</label>

                                            <input type="text" class="form-control" id="estadoViajeA" readonly> 

                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                                
                                        <div class="form-group">

                                            <label class="control-label">Ciudad (Municipio):</label>

                                            <input type="text" class="form-control" id="destinoViajeA" readonly> 

                                        </div>

                                    </div>

                                    <div class="col-md-12">

	                                    <hr>

	                                    <h2><small>Datos Generales del servicio</small></h2>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group has-danger">

                                            <label class="control-label">Fecha</label>

                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fechaA"></div>

                                    	</div>

									</div>

									<div class="col-md-5 ">

                                        <div class="form-group">

                                            <label>Descripcción</label>

                                            <textarea name="descripcionA" class="form-control" id="descripcionA"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <label class="control-label">Tipo de Servicio</label>

                                            <select class="form-control custom-select" id="tipoViajeA" name="tipoViajeA">

                                                <option value="seleccionar">--elige una opción--</option>

                                                <option value="Primex">Primex</option>

                                                <option value="Especial">Especial</option>

                                            </select>

                                            </div>

                                    </div>

                                    <center>

                                        <div class="form-actions">

                                            <button type="button" class="btn btn-success" id="guardarA"> <i class="fa fa-check"></i> Guardar</button>

                                            <button type="button" class="btn btn-inverse" id="borrarA">Borrar</button>

                                        </div>

                                </center>

                            </div>

                            <!--End form-body -->

						</form>

					</div>

                    <!-- End card-body -->

				</div>

                <!-- End card-outline -->

			</div>

            <!-- lg12 -->

        </div>

        <!-- End row -->

    </div>

    <!-- Container fluid  -->

</div>

<!--End Page wrapper 