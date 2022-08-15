<!-- Page wrapper  -->

<div class="page-wrapper">

    <!-- Bread crumb -->

    <div class="row page-titles">

        <div class="col-md-5 align-self-center">

            <h3 class="text-primary">Ver Servicios</h3> </div>

        <div class="col-md-7 align-self-center">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Servicios</a></li>

                <li class="breadcrumb-item active">Ver</li>

            </ol>

        </div>

    </div>

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

						 <h4 class="card-title">Administrar Servicios</h4>

	                     <h6 class="card-subtitle">Imprime, edita o elimina recibo</h6>

	                     <div class="table-responsive m-t-40" id="tb">

							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

								<thead>

                                    <tr>

                                        <th>Número</th>

                                        <th>Fecha</th>

                                        <th>descripcción</th>

                                        <th>Cantidad</th>

                                        <th>Descargar Recibo</th>

                                        <th>Editar</th>

                                        <th>Eliminar</th>

                                    </tr>

                                </thead>

                                <tbody>

									<?php date_default_timezone_set('america/mexico_city');

										function fechaFormato($fecha) {

                                          $numeroDia = date('d', strtotime($fecha));

                                          $dia = date('l', strtotime($fecha));

                                          $mes = date('F', strtotime($fecha));

                                          $anio = date('Y', strtotime($fecha));

                                          $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

                                          $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

                                          $nombredia = str_replace($dias_EN, $dias_ES, $dia);

                                          $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                                          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                                          $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

                                          return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

                                        }

                                        $numeroOrden = 1;

                                        $item = null;
                                        $valor = null;
                                        $itemOrden = "id_recibo";
                                        $orden = "DESC";

                                        $servicios = ControladorServicios::ctrMostrarServicios($item, $valor, $itemOrden, $orden);

                                        foreach ($servicios as $key => $value) {

                                        	$formatter = new NumberFormatter('en_US',  NumberFormatter::CURRENCY);

	                                        $cantidad = $formatter->formatCurrency($value["cantidad"], 'USD');

	                                        $fechaserv = $value["fecha"];

	                                        $fechat = fechaFormato($fechaserv); ?>

											<tr>

												<td><?php echo $numeroOrden; ?></td>

		                                        <td><?php echo $fechat; ?></td>

		                                        <td><?php echo $value["descripcion"]; ?></td>

		                                        <td><?php echo $cantidad; ?></td>

		                                        <td><a class="" href="vista/modulos/comprobante.php?id_recibo=<?php echo $value["id_recibo"]; ?>" target="_blank" aria-expanded="false"><i class="fa fa-floppy-o"></i> <span class="hide-menu"> Descargar</span></a></td>

		                                        <!-- <td><a class="" href="vista/modulos/editar-servicio?id_recibo=<?php //echo $value["id_recibo"]; ?>" aria-expanded="false"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i> <span class="hide-menu"> Editar</span></a></td> -->

		                                        <td><a id="lsIdServicio" href="editar-servicio" aria-expanded="false" idRecibo="<?php echo $value["id_recibo"]; ?>"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i> <span class="hide-menu"> Editar</span></a></td>

		                                        <td><a class="" href="" aria-expanded="false" data-id="<?php echo $value["id_recibo"]; ?>" id="eliminarser" onclick="return false;" ><i class="mdi mdi-delete font-18 align-middle mr-2"></i> <span class="hide-menu"> Eliminar</span></a></td>

											</tr>

                                  			<?php

                                  			$numeroOrden++;

                              			}

                              			?>

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
