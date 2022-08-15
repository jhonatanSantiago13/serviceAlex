<!-- Page wrapper  -->

<div class="page-wrapper">

    <!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Ver Destinos Fijos</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinos Foraneos</a></li>

                <li class="breadcrumb-item active">Ver Destinos Fijos</li>

            </ol>

        </div>

    </div>

    <!-- End Bread crumb -->

	<!--Container fluid  -->

	<div class="container-fluid">

		<!-- row -->

		<div class="row">

			<!-- lg12 -->

			<div class="col-lg-12">

				<!-- card -->

				<div class="card">

					<!-- card-body -->

					<div class="card-body">

						 <h4 class="card-title">Administrar Rutas</h4>

             <h6 class="card-subtitle">Descarga,edita o elimina destinos</h6>
        
             <!-- Descargar catalogo -->

             <div class="col-lg-12">
               
                <div class="card card-outline-primary">
                  
                    <div class="card-header">
                      
                        <h4 class="m-b-0 text-white">Descargar Catálogo de Destinos</h4>

                    </div>

                    <div class="card-body">
                        
                        <form action="vista/modulos/reportexls.php" method="POST">
                          
                            <div class="form-body">
                              
                                <br>

                                <div class="form-actions">
                                  
                                    <center>
                                        <input type="hidden" value="destinos" name="tipoRespaldo">
                                        <button type="submit" class="btn btn-success" id="descargar"> <i class="fa fa-check"></i> Descargar</button>

                                    </center>

                                </div>

                            </div>

                        </form>

                    </div>
 
                </div>

             </div>

             <!--End Descargar catalogo -->

             <div class="table-responsive m-t-40" id="tb">

    							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

    								<thead>

                        <tr>

                            <th>Número</th>

                            <th>Lugar de Origen</th>

                            <th>Lugar de Destino</th>

                            <th>Tipo del Viaje</th>

                            <th>Cantidad ($)</th>

                            <th>Editar</th>

                            <th>Eliminar</th>

                        </tr>

                      </thead>

                      <tbody>
                            
                            <?php  

                              $item = null;
                              $valor = null;
                              $itemOrden = "ciudad_destino";
                              $orden = "ASC";


                              $destinos = ControladorDestinos::ctrMostrarDestinos($item, $valor, $itemOrden, $orden);

                              $numeroOrden = 1;

                              foreach ($destinos as $key => $value) { 
                                
                                  $formatter = new NumberFormatter('en_US',  NumberFormatter::CURRENCY);
                                  $cantidad = $formatter->formatCurrency($value['cantidad'], 'USD'); ?>

                                  <tr>

                                      <td><?php echo $numeroOrden; ?></td>

                                      <td><?php echo $value['lugar_origen']; ?></td>

                                      <td><?php echo $value['ciudad_destino']; ?></td>

                                      <td><?php echo $value['tipo']; ?></td>

                                      <td><?php echo $cantidad; ?></td>

                                      <!-- <td><a class="" href="editar-ruta?id_destino=<?php //echo $value['id']; ?>" aria-expanded="false"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i> <span class="hide-menu"> Editar</span></a></td> -->

                                      <td><a id="lsRuta" class="" href="editar-ruta" idRuta="<?php echo $value['id']; ?>" aria-expanded="false"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i> <span class="hide-menu"> Editar</span></a></td>
                                      
                                      <td><a class="" href="" aria-expanded="false" data-id="<?php echo $value['id']; ?>" id="eliminarDestinos" onclick="return false;" ><i class="mdi mdi-delete font-18 align-middle mr-2"></i> <span class="hide-menu"> Eliminar</span></a></td>

                                  </tr>



                          <?php 

                                  $numeroOrden++;

                              } ?>

                                	
    									
                      </tbody>

    							</table>

	             </div>

					</div>

					<!-- End card-body -->

				</div>

				<!-- End card -->

			</div>

			<!-- End lg12 -->

		</div>

		<!-- End row -->

	</div>

	<!-- Container fluid -->

</div>

<!-- Page wrapper  -->
