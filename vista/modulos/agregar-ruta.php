<!--Page wrapper  -->

<div class="page-wrapper">

	<!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Agregar Destino fijo</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinos Foraneos</a></li>

                <li class="breadcrumb-item active">Agregar Destino</li>

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

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label class="control-label">Lugar donde origen del destino</label>

                                                    <select class="form-control custom-select" id="lugarOrigen" name="lugarOrigen">

                                                        <option value="seleccionar">--elige una opción--</option>

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

                                                    <select class="form-control custom-select" id="tipoViaje" name="tipoViaje">

                                                        <option value="seleccionar">--elige una opción--</option>

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

                                                    <select class="form-control custom-select" id="estado" name="estado">

                                                        <!--<option value="seleccionar">--elige una opción--</option>-->

                                                    </select>

                                                    </div>

                                            </div>

                                        <div class="col-md-6">
                                                

                                                <div class="form-group">

                                                    <label class="control-label">Municipio/Ciudad</label>

                                                    <select class="form-control custom-select" id="ciudad" name="ciudad">

                                                        <option value="seleccionar">--elige una opción--</option>

                                                    </select>

                                                    </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label class="control-label">Cantidad ($)</label>

                                                    <input type="text" class="form-control" id="cantidad">

                                                    <small class="form-control-feedback">Agregar el monto del viaje sin incluir casetas</small>

                                                </div>

                                            </div>

                                    </div>

                                    <center>

                                        <div class="form-actions">

                                            <button type="button" class="btn btn-success" id="guardarRuta"> <i class="fa fa-check"></i> Guardar</button>

                                            <button type="button" class="btn btn-inverse" id="borrarRuta">Borrar</button>

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