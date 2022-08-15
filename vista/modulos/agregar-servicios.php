<!--Page wrapper  -->

<div class="page-wrapper">

    <!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Agregar Servicio</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Servicios</a></li>

                <li class="breadcrumb-item active">Agregar servicio</li>

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

                                            <label class="control-label">Tipo de Servicio</label>

                                            <select class="form-control custom-select" id="tipo" name="tipo">

                                                <option value="seleccionar">--elige una opción--</option>

                                                <option value="Primex">Primex</option>

                                                <option value="Especial">Especial</option>

                                            </select>

                                         </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group has-danger">

                                        <label class="control-label">Fecha</label>

                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fecha"></div>

                                    </div>         

                                </div>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="control-label" >Hora de Inicio</label>

                                            <input type="time" class="form-control" id="hora_inicio" >

                                            <small class="form-control-feedback">formato hh:mm am/pm</small>                

                                         </div>        

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="control-label">Hora de Fin</label>

                                            <input type="time" class="form-control" id="hora_fin">

                                             <small class="form-control-feedback">formato hh:mm am/pm</small>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="control-label">Origen del viaje</label>

                                            <input type="text" id="origen" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label class="control-label">Destino del viaje</label>

                                            <input type="text" id="destino" class="form-control">

                                        </div>

                                    </div>
      
                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label class="control-label">Cantidad ($)</label>

                                            <input type="text" class="form-control cantidadAgregar" id="cantidad">

                                            <small class="form-control-feedback">Solo agregar si es un servicio especial</small>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-5 ">

                                        <div class="form-group">

                                            <label>Descripcción</label>

                                            <textarea name="descripcion" class="form-control" id="descripcion"></textarea>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-actions">

                                        <button type="button" class="btn btn-success" id="guardar"> <i class="fa fa-check"></i> Guardar</button>

                                        <button type="button" class="btn btn-inverse" id="borrar">Borrar</button>

                                </div>

                            </div>

                            <!-- end form-body -->

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

<!--End Page wrapper -->
