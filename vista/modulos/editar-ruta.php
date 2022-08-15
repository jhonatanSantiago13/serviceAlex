<!--Page wrapper  -->

<div class="page-wrapper">

	<!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Editar Destino</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Ver Destinos</a></li>

                <li class="breadcrumb-item active">Editar Destino</li>

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

                        <h4 class="m-b-0 text-white">Datos de la ruta</h4>

                    </div>

                    <!-- card-body -->

                    <div class="card-body">

                        <form action="#">
                        	
							<!-- form-body -->

                            <div class="form-body">

								<div class="row p-t-20">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label class="control-label">Lugar donde origen del destino</label>

                                                    <select class="form-control custom-select" id="lugarOrigenEditar" name="lugarOrigenEditar">
                                                        
                                                        <option value="aeropuerto">Aeropuerto</option>

                                                        <option value="polanco">Polanco</option>

                                                        <option value="santa-fe">Santa Fe</option>

                                                    </select>

                                                    </div>

                                            </div>

                                         

                                        <!--/row-->

                                        <div class="col-md-6">

                                                <div class="form-group">

                                                    <label class="control-label">Tipo de viaje</label>

                                                    <select class="form-control custom-select" id="tipoViajeEditar" name="tipoViajeEditar">
                                                   
                                                        <option value="ida">Ida</option>

                                                        <option value="ida-vuelta">Ida y Vuelta</option>

                                                    </select>

                                                    </div>

                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <h2><small>Datos del destino</small></h2>

                                        </div>


                                         <div class="col-md-6">
                                                

                                                <div class="form-group">

                                                    <label class="control-label">Estado</label>

                                                    <input type="text" class="form-control custom-select" id="estadoEditar" name="estadoEditar" readonly>

                                                    </div>

                                            </div>

                                        <div class="col-md-6">
                                                

                                                <div class="form-group">

                                                    <label class="control-label">Municipio/Ciudad</label>

                                                    <input type="text" class="form-control custom-select" id="ciudadEditar" name="ciudadEditar" readonly>

                                                    </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label class="control-label">Cantidad ($)</label>

                                                    <input type="text" class="form-control cantidadDestinoEditar" id="cantidad">

                                                    <small class="form-control-feedback">Agregar el monto del viaje sin incluir casetas</small>

                                                </div>

                                            </div>

                                    </div>

                                    <center>

                                        <div class="form-actions">

                                            <button type="button" class="btn btn-success" id="ActualizarRuta"> <i class="fa fa-check"></i> Guardar</button>

                                            <a href="ver-rutas"><button type="button" class="btn btn-inverse" id="regresarRuta">Regresar</button></a>

                                            <button type="button" class="btn btn-primary" id="reset">Borrar cambios</button>

                                        </div>

                                	</center>

                            </div>

                            <!-- End form-body -->

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