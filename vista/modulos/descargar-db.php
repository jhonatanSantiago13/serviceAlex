Page wrapper  -->

<div class="page-wrapper">

	<!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Descargar Excel</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Descargar</a></li>

                <li class="breadcrumb-item active">Descargar servicios</li>

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

                        <h4 class="m-b-0 text-white">Descargar excel</h4>

                    </div>

                    <div class="card-body">

                        <form action="vista/modulos/reportexls.php" method="POST" name="fr">

                            <div class="form-body">

                                 <div class="row p-t-20">

                                   <div class="col-md-6">

                                        <div class="form-group has-danger">

                                            <label class="control-label">Fecha del</label>

                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fechadel" name="fechadel"></div>

                                    </div>

                                    <!--/span-->

                                    <div class="col-md-6">

                                        <div class="form-group has-danger">

                                            <label class="control-label">Fecha al</label>

                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fechaal" name="fechaal"></div>

                                    </div>

                                    <!--/span-->

                                </div>

                                <!--/row-->

                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" id="descargar"> <i class="fa fa-check"></i> Descargar</button>

                                <button type="button" class="btn btn-inverse" id="regresar">Regresar</button>

                            </div>

                        </form>

                    </div>

                    <!-- card body -->

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